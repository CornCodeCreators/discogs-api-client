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

use CornCodeCreators\Discogs\Dto\Database\ReleaseRating;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseRating>
 */
class RatingFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseRating
    {
        $ratingDto = new ReleaseRating();

        $ratingDto->setCount($data['count'] ?? null);
        $ratingDto->setAverage($data['average'] ?? null);

        return $ratingDto;
    }
}
