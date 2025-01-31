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

use CornCodeCreators\Discogs\Dto\Database\Release;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Release>
 */
class ReleaseFactory extends BaseFactory
{
    public static function fromArray(array $data): Release
    {
        $releaseDto = new Release();

        $releaseDto->setTitle($data['title'] ?? null);
        $releaseDto->setId($data['id'] ?? null);
        $releaseDto->setDataQuality($data['data_quality'] ?? null);
        $releaseDto->setThumb($data['thumb'] ?? null);
        $releaseDto->setCountry($data['country'] ?? null);
        $releaseDto->setDateAdded($data['date_added'] ?? null);
        $releaseDto->setDateChanged($data['date_changed'] ?? null);
        $releaseDto->setEstimatedWeight($data['estimated_weight'] ?? null);
        $releaseDto->setFormatQuantity($data['format_quantity'] ?? null);
        $releaseDto->setGenres($data['genres'] ?? []);
        $releaseDto->setLowestPrice($data['lowest_price'] ?? null);
        $releaseDto->setMasterId($data['master_id'] ?? null);
        $releaseDto->setMasterUrl($data['master_url'] ?? null);
        $releaseDto->setNotes($data['notes'] ?? null);
        $releaseDto->setNumForSale($data['num_for_sale'] ?? null);
        $releaseDto->setReleasedAt($data['released'] ?? null);
        $releaseDto->setReleasedAtFormatted($data['released_formatted'] ?? null);
        $releaseDto->setResourceUrl($data['resource_url'] ?? null);
        $releaseDto->setSeries($data['series'] ?? []);
        $releaseDto->setStatus($data['status'] ?? null);
        $releaseDto->setStyles($data['styles'] ?? []);
        $releaseDto->setUri($data['uri'] ?? null);
        $releaseDto->setYear($data['year'] ?? null);
        $releaseDto->setFormat($data['format'] ?? []);
        $releaseDto->setCatNo($data['catno'] ?? null);

        // Generic DTOs
        $releaseDto->setImages(array_map([ImageFactory::class, 'fromArray'], $data['images'] ?? []));
        $releaseDto->setTracks(array_map([TrackFactory::class, 'fromArray'], $data['tracklist'] ?? []));

        // Specific DTOs
        $releaseDto->setCommunity(ReleaseCommunityFactory::fromArray($data['community'] ?? []));

        $releaseDto->setArtists(array_map([ReleaseArtistFactory::class, 'fromArray'], $data['artists'] ?? []));
        $releaseDto->setCompanies(array_map([ReleaseCompanyFactory::class, 'fromArray'], $data['companies'] ?? []));
        $releaseDto->setExtraArtists(array_map([ReleaseArtistFactory::class, 'fromArray'], $data['extraartists'] ?? []));
        $releaseDto->setFormats(array_map([ReleaseFormatFactory::class, 'fromArray'], $data['formats'] ?? []));
        $releaseDto->setIdentifiers(array_map([ReleaseIdentifierFactory::class, 'fromArray'], $data['identifiers'] ?? []));
        $releaseDto->setLabels(array_map([ReleaseLabelFactory::class, 'fromArray'], $data['labels'] ?? []));
        $releaseDto->setVideos(array_map([ReleaseVideoFactory::class, 'fromArray'], $data['videos'] ?? []));

        return $releaseDto;
    }
}
