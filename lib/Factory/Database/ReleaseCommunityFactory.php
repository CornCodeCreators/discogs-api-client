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

use CornCodeCreators\Discogs\Dto\Database\ReleaseCommunity;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseCommunity>
 */
class ReleaseCommunityFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseCommunity
    {
        $community = new ReleaseCommunity();

        $community->setDataQuality($data['data_quality'] ?? null);
        $community->setHave($data['have'] ?? null);
        $community->setStatus($data['status'] ?? null);
        $community->setWant($data['want'] ?? null);

        $community->setRating(RatingFactory::fromArray($data['rating'] ?? []));
        $community->setSubmitter(SubmitterFactory::fromArray($data['submitter'] ?? []));

        $community->setContributors(array_map([ContributorFactory::class, 'fromArray'], $data['contributors'] ?? []));

        return $community;
    }
}
