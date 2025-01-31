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

use CornCodeCreators\Discogs\Dto\Database\Artist;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Artist>
 */
class ArtistFactory extends BaseFactory
{
    public static function fromArray(array $data): Artist
    {
        $artist = new Artist();

        $artist->setName($data['name'] ?? null);
        $artist->setId($data['id'] ?? null);
        $artist->setResourceUrl($data['resource_url'] ?? null);
        $artist->setUri($data['uri'] ?? null);
        $artist->setReleasesUrl($data['releases_url'] ?? null);
        $artist->setImages(array_map([ImageFactory::class, 'fromArray'], $data['images'] ?? []));
        $artist->setProfile($data['profile'] ?? null);
        $artist->setUrls($data['urls'] ?? []);
        $artist->setNameVariations($data['namevariations'] ?? []);
        $artist->setMembers(array_map([MemberFactory::class, 'fromArray'], $data['members'] ?? []));
        $artist->setDataQuality($data['data_quality'] ?? null);

        return $artist;
    }
}
