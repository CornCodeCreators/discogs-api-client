<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Client;

use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Enum\HttpMethod;
use CornCodeCreators\Discogs\Exception\CurlException;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Session\Session;

/*
 * Workflow (see https://www.discogs.com/developers/#page:authentication,header:authentication-oauth-flow)
 *   1) Put values in .env-file ('DISCOGS_USER_AGENT', 'DISCOGS_CONSUMER_KEY', 'DISCOGS_CONSUMER_SECRET')
 *   2) Get request tokens ('oauth_token', 'oauth_token_secret') via getRequestToken() and provide a callback-url
 *   3) Redirect to Authorization Page via getAuthorizeUrl() [URL will contain 'oauth_token']
 *   4) A successful authorization on the Authorization Page will redirect to the callback-url (see point 2)
 *   5) The callback-url shall catch the verifier-value
 *   6) Get access tokens ('oauth_token', 'oauth_token_secret') via getAccessToken() and provide the verifier-code
 */
class OAuthClient extends BaseClient
{
    private const BASE_URL               = 'https://api.discogs.com';
    private const AUTHORIZE_URL          = 'https://www.discogs.com/oauth/authorize';
    private const REQUEST_TOKEN_ENDPOINT = '/oauth/request_token';
    private const ACCESS_TOKEN_ENDPOINT  = '/oauth/access_token';

    private string $userAgent;

    private string $consumerKey;

    private string $consumerSecret;

    private Session $session;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(?string $userAgent = null, ?string $consumerKey = null, ?string $consumerSecret = null)
    {
        parent::__construct();

        if ((!$userAgent) && (!$consumerKey) && (!$consumerSecret)) { // both params are NULL
            $this->userAgent      = $_SERVER['DISCOGS_USER_AGENT'];
            $this->consumerKey    = $_SERVER['DISCOGS_CONSUMER_KEY'];
            $this->consumerSecret = $_SERVER['DISCOGS_CONSUMER_SECRET'];
        } elseif ($userAgent && $consumerKey && $consumerSecret) { // both params are NOT NULL
            $this->userAgent      = $userAgent;
            $this->consumerKey    = $consumerKey;
            $this->consumerSecret = $consumerSecret;
        } else {
            throw new InvalidArgumentException('Either all parameters must be set together as constructor parameters, OR they have to be present as environment variables.');
        }

        $this->session = new Session();
        $this->session->start();
    }

    /**
     * @throws InvalidArgumentException
     * @throws CurlException
     */
    public function request(HttpMethod $method, string $endpoint, array $options = []): Response
    {
        if ($endpoint === self::AUTHORIZE_URL) {
            $url = $endpoint;
        } else {
            $url = self::BASE_URL.$endpoint;
        }

        $defaultHeaders = [
            'User-Agent'   => $this->userAgent,
            'Content-Type' => 'application/json',
        ];
        $options  = array_merge_recursive($options, ['headers' => $defaultHeaders]);
        $response = $this->curlRequest($method, $url, $options);

        return $response;
    }

    /**
     * STEP 1.
     *
     * @throws InvalidArgumentException
     * @throws CurlException
     *
     * @return array<string, string>
     */
    public function getRequestToken(string $callbackUrl): array
    {
        $authorizationHeaderString = $this->getAuthorizationHeaderString(callbackUrl: $callbackUrl);

        $options = [
            'headers' => [
                'Authorization' => "OAuth {$authorizationHeaderString}",
            ],
        ];

        $response = $this->request(HttpMethod::POST, self::REQUEST_TOKEN_ENDPOINT, $options);

        $data = $response->parseContent();

        $this->storeTokens($data);

        return $data;
    }

    /**
     * STEP 2.
     */
    public function getAuthorizeUrl(): string
    {
        return self::AUTHORIZE_URL.'?oauth_token='.$this->getOAuthToken();
    }

    /**
     * STEP 3.
     *
     * @throws InvalidArgumentException
     * @throws CurlException
     *
     * @return array<string, string>
     */
    public function getAccessToken(string $oauthVerifier): array
    {
        $authorizationHeaderString = $this->getAuthorizationHeaderString(oauthVerifier: $oauthVerifier);

        $options = [
            'headers' => [
                'Authorization' => "OAuth {$authorizationHeaderString}",
            ],
        ];

        $response = $this->request(HttpMethod::POST, self::ACCESS_TOKEN_ENDPOINT, $options);

        $data = $response->parseContent();

        $this->storeTokens($data);

        return $data;
    }

    private function getAuthorizationHeaderString(?string $callbackUrl = null, ?string $oauthVerifier = null): string
    {
        if ($callbackUrl && $oauthVerifier) {
            throw new InvalidArgumentException('You can only provide non or just one parameter!');
        }

        $defaultOptions = [
            'oauth_timestamp'        => time(),
            'oauth_nonce'            => bin2hex(random_bytes(8)),
            'oauth_signature_method' => 'PLAINTEXT',
            'oauth_consumer_key'     => "{$this->consumerKey}",
        ];

        if ($callbackUrl) {
            $oauthOptions = [
                'oauth_signature' => "{$this->consumerSecret}&",
                'oauth_callback'  => "{$callbackUrl}", // unique in step 1
            ];
        } elseif ($oauthVerifier) {
            $oauthOptions = [
                'oauth_signature' => "{$this->consumerSecret}&{$this->getOAuthTokenSecret()}",
                'oauth_token'     => "{$this->getOAuthToken()}",
                'oauth_verifier'  => "{$oauthVerifier}",
            ];
        } else {
            $oauthOptions = [
                'oauth_signature' => "{$this->consumerSecret}&{$this->getOAuthTokenSecret()}",
                'oauth_token'     => "{$this->getOAuthToken()}",
            ];
        }

        $oauthOptions = array_merge($oauthOptions, $defaultOptions);

        return $this->stringify($oauthOptions);
    }

    /**
     * @param array<string, int<1, max>|string> $oauth
     */
    private function stringify(array $oauth): string
    {
        $oauth_string = implode(', ', array_map(function ($key, $value) {
            return $key.'="'.$value.'"';
        }, array_keys($oauth), $oauth));

        return $oauth_string;
    }

    /**
     * @param array<string, string> $data
     */
    private function storeTokens(array $data): void
    {
        $this->session->set('oauth_token', $data['oauth_token']);
        $this->session->set('oauth_token_secret', $data['oauth_token_secret']);
    }

    private function getOAuthToken(): string
    {
        return $this->session->get('oauth_token', '');
    }

    private function getOAuthTokenSecret(): string
    {
        return $this->session->get('oauth_token_secret', '');
    }
}
