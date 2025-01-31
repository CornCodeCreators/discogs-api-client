<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Factory\Database;

use CornCodeCreators\Discogs\Dto\Database\Versions;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Versions>
 */
class VersionsFactory extends BaseFactory
{
    public static function fromArray(array $data): Versions
    {
        $version = new Versions();

        $version->setId($data['id']);
        $version->setLabel($data['label']);
        $version->setCountry($data['country']);
        $version->setTitle($data['title']);
        $version->setMajorFormats($data['major_formats']);
        $version->setFormat($data['format']);
        $version->setCatno($data['catno']);
        $version->setReleased($data['released']);
        $version->setStatus($data['status']);
        $version->setResourceUrl($data['resource_url']);
        $version->setThumb($data['thumb']);
        $version->setStats($data['stats']);

        return $version;
    }
}
