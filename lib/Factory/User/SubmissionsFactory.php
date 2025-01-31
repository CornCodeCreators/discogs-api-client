<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Factory\User;

use CornCodeCreators\Discogs\Dto\User\Submissions;
use CornCodeCreators\Discogs\Factory\BaseFactory;
use CornCodeCreators\Discogs\Factory\Database\ArtistFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseLabelFactory;

/**
 * @extends BaseFactory<Submissions>
 */
class SubmissionsFactory extends BaseFactory
{
    public static function fromArray(array $data): Submissions
    {
        $submissions = new Submissions();

        // $submissions->setReleases($data['releases']);
        $submissions->setReleases(array_map([ReleaseFactory::class, 'fromArray'], $data['releases'] ?? []));
        $submissions->setArtists(array_map([ArtistFactory::class, 'fromArray'], $data['artists'] ?? []));
        $submissions->setLabels(array_map([ReleaseLabelFactory::class, 'fromArray'], $data['labels'] ?? []));

        return $submissions;
    }
}
