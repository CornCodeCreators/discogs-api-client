<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Factory;

use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\InvalidJsonException;

/**
 * @template T
 */
abstract class BaseFactory
{
    /**
     * @param array<string, mixed> $data
     *
     * @return T
     */
    abstract public static function fromArray(array $data);

    /**
     * @throws InvalidJsonException
     * @throws FailedResponseException
     *
     * @return T
     */
    final public static function fromResponse(Response $response)
    {
        $data   = $response->getData();
        $object = static::fromArray($data);

        return $object;
    }
}
