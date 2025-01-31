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

use CornCodeCreators\Discogs\Dto\Database\MasterRelease;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<MasterRelease>
 */
class MasterReleaseFactory extends BaseFactory
{
    public static function fromArray(array $data): MasterRelease
    {
        $masterDto = new MasterRelease();

        $masterDto->setStyles($data['styles'] ?? []);
        $masterDto->setGenres($data['genres'] ?? []);
        $masterDto->setTitle($data['title'] ?? '');
        $masterDto->setMainRelease($data['main_release'] ?? null);
        $masterDto->setMainReleaseUrl($data['main_release_url'] ?? null);
        $masterDto->setMostRecentRelease($data['most_recent_release'] ?? null);
        $masterDto->setMostRecentReleaseUrl($data['most_recent_release_url'] ?? null);
        $masterDto->setUri($data['uri'] ?? null);
        $masterDto->setVersionsUrl($data['versions_url'] ?? null);
        $masterDto->setYear($data['year'] ?? null);
        $masterDto->setResourceUrl($data['resource_url'] ?? null);
        $masterDto->setId($data['id'] ?? 0);
        $masterDto->setNumForSale($data['num_for_sale'] ?? null);
        $masterDto->setLowestPrice($data['lowest_price'] ?? null);
        $masterDto->setDataQuality($data['data_quality'] ?? null);

        $masterDto->setArtists(array_map([ReleaseArtistFactory::class, 'fromArray'], $data['artists'] ?? []));
        $masterDto->setImages(array_map([ImageFactory::class, 'fromArray'], $data['images'] ?? []));
        $masterDto->setTracks(array_map([TrackFactory::class, 'fromArray'], $data['tracklist'] ?? []));

        return $masterDto;
    }
}
