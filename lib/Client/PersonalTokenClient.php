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

class PersonalTokenClient extends BaseClient
{
    public const BASE_URL = 'https://api.discogs.com'; // Can be private?

    private string $userAgent;

    private string $userToken;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(?string $userAgent = null, ?string $userToken = null)
    {
        parent::__construct();

        if ((!$userAgent) && (!$userToken)) { // both params are NULL
            $this->userAgent = $_SERVER['DISCOGS_USER_AGENT'];
            $this->userToken = $_SERVER['DISCOGS_USER_TOKEN'];
        } elseif ($userAgent && $userToken) { // both params are NOT NULL
            $this->userAgent = $userAgent;
            $this->userToken = $userToken;
        } else {
            throw new InvalidArgumentException('Either "userAgent" and "userToken" must be set together as constructor parameters, OR they have to be present as environment variables.');
        }
    }

    /**
     * @throws CurlException
     * @throws InvalidArgumentException
     */
    public function request(HttpMethod $method, string $endpoint, array $options = []): Response
    {
        $url = self::BASE_URL.$endpoint;

        $defaultHeaders = [
            'User-Agent'    => $this->userAgent,
            'Authorization' => "Discogs token=$this->userToken",
            'Content-Type'  => 'application/json',
        ];

        $options  = array_merge_recursive($options, ['headers' => $defaultHeaders]);
        $response = $this->curlRequest($method, $url, $options);

        return $response;
    }
}
