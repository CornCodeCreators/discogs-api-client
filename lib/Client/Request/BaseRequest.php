<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Client\Request;

use CornCodeCreators\Discogs\Client\BaseClient;
use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Enum\HttpMethod;

class BaseRequest
{
    public const BASE_URI = 'https://api.discogs.com';

    public function __construct(
        private readonly BaseClient $client,
    ) {
    }

    /**
     * @param array<string, mixed> $queryParams
     */
    final protected function request(HttpMethod $method, string $endpoint, array $queryParams = []): Response
    {
        $url = self::BASE_URI.$endpoint;

        $options = [
            'query' => $queryParams,
        ];

        return $this->client->request($method, $url, $options);
    }
}
