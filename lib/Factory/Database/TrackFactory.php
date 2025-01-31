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

use CornCodeCreators\Discogs\Dto\Database\Track;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Track>
 */
class TrackFactory extends BaseFactory
{
    public static function fromArray(array $data): Track
    {
        $track = new Track();

        $track->setDuration($data['duration'] ?? null);
        $track->setPosition($data['position'] ?? null);
        $track->setTitle($data['title'] ?? null);
        $track->setType($data['type_'] ?? null);

        return $track;
    }
}
