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

use CornCodeCreators\Discogs\Dto\Database\ReleaseRatingByCommunity;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseRatingByCommunity>
 */
class ReleaseRatingOfCommunityFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseRatingByCommunity
    {
        $releaseRatingOfCommunityDto = new ReleaseRatingByCommunity();

        $releaseRatingOfCommunityDto->setReleaseId($data['release_id'] ?? null);
        $releaseRatingOfCommunityDto->setRating(RatingFactory::fromArray($data['rating'] ?? null));

        return $releaseRatingOfCommunityDto;
    }
}
