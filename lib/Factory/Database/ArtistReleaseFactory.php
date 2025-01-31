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

use CornCodeCreators\Discogs\Dto\Database\ArtistRelease;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ArtistRelease>
 */
class ArtistReleaseFactory extends BaseFactory
{
    public static function fromArray(array $data): ArtistRelease
    {
        $artistRelease = new ArtistRelease();

        $artistRelease->setId($data['id'] ?? null);
        $artistRelease->setTitle($data['title'] ?? null);
        $artistRelease->setType($data['type'] ?? null);
        $artistRelease->setMainRelease($data['main_release'] ?? null);
        $artistRelease->setArtist($data['artist'] ?? null);
        $artistRelease->setRole($data['role'] ?? null);
        $artistRelease->setResourceUrl($data['resource_url'] ?? null);
        $artistRelease->setYear($data['year'] ?? null);
        $artistRelease->setThumb($data['thumb'] ?? null);
        $artistRelease->setStats($data['stats'] ?? []);

        return $artistRelease;
    }
}
