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

use CornCodeCreators\Discogs\Dto\Database\LabelReleases;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<LabelReleases>
 */
class LabelReleasesFactory extends BaseFactory
{
    public static function fromArray(array $data): LabelReleases
    {
        $labelAndArtistReleases = new LabelReleases();

        $labelAndArtistReleases->setPagination(PaginationFactory::fromArray($data['pagination'] ?? []));
        $labelAndArtistReleases->setReleases(array_map([LabelReleaseFactory::class, 'fromArray'], $data['releases'] ?? []));

        return $labelAndArtistReleases;
    }
}
