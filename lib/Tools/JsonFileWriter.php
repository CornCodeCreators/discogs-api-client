<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tools;

use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;
use CornCodeCreators\Discogs\Exception\InvalidJsonException;
use CornCodeCreators\Discogs\Exception\InvalidTypeException;
use Exception;

class JsonFileWriter
{
    /**
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public static function storeResponse(Response $response): void
    {
        // compose filename
        $url = $response->getInfo('url');

        if (!is_string($url)) {
            throw new InvalidTypeException('String expected, got '.gettype($url));
        }

        $filename = str_replace('https://api.discogs.com/', '', $url);
        $filename = str_replace('/', '_', $filename).'.json';

        // folder
        $folder = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_jsonData';
        $folder = realpath($folder);

        if (!$folder) {
            throw new Exception("Folder '{$folder}' does not exist");
        }

        $uri = $folder.DIRECTORY_SEPARATOR.$filename;

        // create content
        try {
            $json = json_encode($response->getData(), JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            return;
        }

        // write the json-string to file
        if (file_put_contents($uri, $json) === false) {
            throw new Exception("Can't write content to '{$uri}'");
        }
    }
}
