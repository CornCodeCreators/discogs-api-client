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

use CornCodeCreators\Discogs\Dto\Database\ReleaseVideo;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseVideo>
 */
class ReleaseVideoFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseVideo
    {
        $video = new ReleaseVideo();

        $video->setDescription($data['description'] ?? null);
        $video->setDuration($data['duration'] ?? null);
        $video->setEmbed($data['embed'] ?? false);
        $video->setTitle($data['title'] ?? null);
        $video->setUri($data['uri'] ?? null);

        return $video;
    }
}
