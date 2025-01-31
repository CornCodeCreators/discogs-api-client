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

use CornCodeCreators\Discogs\Dto\Database\LabelRelease;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<LabelRelease>
 */
class LabelReleaseFactory extends BaseFactory
{
    public static function fromArray(array $data): LabelRelease
    {
        $labelRelease = new LabelRelease();

        $labelRelease->setStatus($data['status']);
        $labelRelease->setFormat($data['format']);
        $labelRelease->setCatno($data['catno']);
        $labelRelease->setThumb($data['thumb']);
        $labelRelease->setResourceUrl($data['resource_url']);
        $labelRelease->setTitle($data['title']);
        $labelRelease->setId($data['id']);
        $labelRelease->setYear($data['year']);
        $labelRelease->setArtist($data['artist']);
        $labelRelease->setStats($data['stats']);

        return $labelRelease;
    }
}
