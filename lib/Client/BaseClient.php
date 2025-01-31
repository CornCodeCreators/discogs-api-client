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

use CornCodeCreators\Discogs\Client\Request\DatabaseRequest;
use CornCodeCreators\Discogs\Client\Request\UserIdentityRequest;
use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Enum\HttpMethod;
use CornCodeCreators\Discogs\Exception\CurlException;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;

abstract class BaseClient
{
    protected UserIdentityRequest $userIdentityRequest;

    protected DatabaseRequest $databaseRequestNew;

    /**
     * @param array<string, mixed> $options
     */
    abstract public function request(HttpMethod $method, string $endpoint, array $options = []): Response;

    public function __construct()
    {
        $this->databaseRequestNew  = new DatabaseRequest($this);
        $this->userIdentityRequest = new UserIdentityRequest($this);
    }

    public function requestDatabase(): DatabaseRequest
    {
        return $this->databaseRequestNew;
    }

    public function requestUser(): UserIdentityRequest
    {
        return $this->userIdentityRequest;
    }

    /**
     * @param array<string, mixed> $options
     *
     * @throws InvalidArgumentException
     * @throws CurlException
     */
    protected function curlRequest(HttpMethod $httpMethod, string $url, array $options = []): Response
    {
        // VALIDATE OPTIONS
        $possibleKeys = ['headers', 'query', 'body'];
        foreach ($options as $key => $value) {
            if (!in_array($key, $possibleKeys)) {
                throw new InvalidArgumentException("The value '$key' is not a valid option! Possible values are: ".implode(', ', $possibleKeys));
            }
        }

        // EXTRACT OPTIONS VALUES
        $headers = $options['headers'] ?? [];
        $query   = $options['query'] ?? [];
        $body    = $options['body'] ?? [];

        // APPEND QUERY-STRING TO URL
        if ($query) {
            $url .= '?'.http_build_query($query);
        }

        // CREATE JSON OF BODY
        $jsonBody = json_encode($body);

        if (!$jsonBody) {
            throw new InvalidArgumentException('The body could not be encoded as a json string!');
        }

        // Initialize cURL session
        $curlHandle = curl_init($url);

        // Set cURL options
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $this->stringifyItems($headers));

        if ($httpMethod === HttpMethod::POST) {
            curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $httpMethod->name);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $jsonBody);
        }

        if ($httpMethod === HttpMethod::PUT) {
            curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $httpMethod->name);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $jsonBody);
        }

        if ($httpMethod === HttpMethod::DELETE) {
            curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $httpMethod->name);
        }

        // Execute the request and get the info/response
        $response = curl_exec($curlHandle);
        $info     = curl_getinfo($curlHandle);

        // CHECK FOR ERRORS
        if (is_bool($response)) {
            throw new CurlException('Not possible to execute request!');
        }

        if (curl_errno($curlHandle)) {
            throw new CurlException(curl_error($curlHandle));
        }

        // Close the cURL session
        curl_close($curlHandle);

        // Return the response
        return new Response($info, $response);
    }

    /**
     * @param array<string, string> $headers
     *
     * @return array<int, string>
     */
    private function stringifyItems(array $headers): array
    {
        $result = [];

        foreach ($headers as $key => $value) {
            $result[] = $key.': '.$value;
        }

        return $result;
    }
}
