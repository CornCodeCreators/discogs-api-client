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

use CornCodeCreators\Discogs\Dto\Database\ArtistReleases;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ArtistReleases>
 */
class ArtistReleasesFactory extends BaseFactory
{
    public static function fromArray(array $data): ArtistReleases
    {
        $labelAndArtistReleases = new ArtistReleases();

        $labelAndArtistReleases->setPagination(PaginationFactory::fromArray($data['pagination'] ?? []));
        $labelAndArtistReleases->setReleases(array_map([ArtistReleaseFactory::class, 'fromArray'], $data['releases'] ?? []));

        return $labelAndArtistReleases;
    }
}
