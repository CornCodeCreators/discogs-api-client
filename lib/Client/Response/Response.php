<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Client\Response;

use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;
use CornCodeCreators\Discogs\Exception\InvalidJsonException;
use CornCodeCreators\Discogs\Exception\InvalidTypeException;

class Response
{
    public function __construct(
        /**
         * @var array<string, mixed> $info
         */
        private readonly array $info,
        private readonly string $content,
    ) {
    }

    /**
     * @throws InvalidArgumentException
     *
     * @return array<string, mixed>|string|int|float
     */
    public function getInfo(?string $element = null): array|string|int|float
    {
        if (!$element) {
            return $this->info;
        }

        if (!isset($this->info[$element])) {
            throw new InvalidArgumentException("Element '{$element}' does not exist");
        }

        return $this->info[$element];
    }

    /**
     * @throws InvalidTypeException
     * @throws InvalidArgumentException
     */
    public function getStatusCode(): int
    {
        $statusCode = $this->getInfo('http_code');

        if (!is_int($statusCode)) {
            throw new InvalidTypeException('Response is not an integer');
        }

        return $statusCode;
    }

    public function getContent(): ?string
    {
        return ($this->content === '') ? null : $this->content;
    }

    /**
     * @throws InvalidTypeException
     * @throws InvalidArgumentException
     * @throws FailedResponseException
     *
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        $successRange = range(200, 299);
        if (!in_array($this->getStatusCode(), $successRange)) {
            $msg = $this->getContent();
            throw new FailedResponseException("Response-Code {$this->getStatusCode()} ($msg)");
        }

        if (!$this->getContent()) {
            return [];
        }

        $array = json_decode($this->content, true);

        /* PHP 8.3
        if (!json_validate($this->getContent())) {
            throw new InvalidJsonException();
        }
        */

        /* prior PHP 8.3 */
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidJsonException();
        }

        return $array;
    }

    /**
     * This function ensures string as key and value in the output array.
     * Needed to please phpstan on the parse_str()-function.
     *
     * @throws InvalidTypeException
     *
     * @return array<string, string>
     */
    public function parseContent(): array
    {
        $content = $this->getContent();

        if (!is_string($content)) {
            throw new InvalidTypeException('Response is not a string');
        }

        parse_str($content, $data);

        $result = [];
        foreach ($data as $key => $value) {
            if (!is_string($key) || !is_string($value)) {
                throw new InvalidTypeException('Key/Value must be a string');
            }

            $result[$key] = $value;
        }

        return $result;
    }
}
