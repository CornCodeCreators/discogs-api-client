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

use CornCodeCreators\Discogs\Dto\Database\ReleaseArtist;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseArtist>
 */
class ReleaseArtistFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseArtist
    {
        $artist = new ReleaseArtist();

        $artist->setAnv($data['anv'] ?? null);
        $artist->setId($data['id'] ?? null);
        $artist->setJoin($data['join'] ?? null);
        $artist->setName($data['name'] ?? null);
        $artist->setResourceUrl($data['resource_url'] ?? null);
        $artist->setRole($data['role'] ?? null);
        $artist->setTracks($data['tracks'] ?? null);

        return $artist;
    }
}
