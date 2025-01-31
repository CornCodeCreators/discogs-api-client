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

use CornCodeCreators\Discogs\Dto\Database\ReleaseRatingByUser;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseRatingByUser>
 */
class ReleaseRatingOfUserFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseRatingByUser
    {
        $releaseRatingByUserDto = new ReleaseRatingByUser();

        $releaseRatingByUserDto->setReleaseId($data['release_id'] ?? null);
        $releaseRatingByUserDto->setUsername($data['username'] ?? null);
        $releaseRatingByUserDto->setRating($data['rating'] ?? null);

        return $releaseRatingByUserDto;
    }
}
