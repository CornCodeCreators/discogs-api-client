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

use CornCodeCreators\Discogs\Dto\Database\ArtistRelease;
use CornCodeCreators\Discogs\Dto\Database\Label;
use CornCodeCreators\Discogs\Dto\Database\MasterRelease;
use CornCodeCreators\Discogs\Dto\Database\Release;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Release|MasterRelease|ArtistRelease|Label>
 */
class SearchResultFactory extends BaseFactory
{
    /**
     * @throws InvalidArgumentException
     */
    public static function fromArray(array $data): Release|MasterRelease|ArtistRelease|Label
    {
        $entityType = $data['type'];

        $searchResult = match ($entityType) {
            'release' => ReleaseFactory::fromArray(self::normalizeRelease($data)),
            'master'  => MasterReleaseFactory::fromArray($data),
            'artist'  => ArtistReleaseFactory::fromArray($data),
            'label'   => LabelFactory::fromArray($data),
            default   => throw new InvalidArgumentException("Unknown entity type '$entityType'"),
        };

        return $searchResult;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return array<string, mixed>
     */
    private static function normalizeRelease(array $data): array
    {
        // normalize LABEL
        $data['labels'] = array_map(fn ($labelName) => ['name' => $labelName], $data['label']);
        unset($data['label']);

        // normalize BARCODE
        $data['identifiers'] = array_map(fn ($barcode) => ['value' => $barcode], $data['barcode']);
        unset($data['barcode']);

        // normalize COVER_IMAGE
        $data['images'] = [['resource_url' => $data['cover_image']]];
        unset($data['cover_image']);

        // normalize GENRE
        $data['genres'] = $data['genre'];
        unset($data['genre']);

        // normalize STYLE
        $data['styles'] = $data['style'];
        unset($data['style']);

        return $data;
    }
}
