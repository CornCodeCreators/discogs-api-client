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

use CornCodeCreators\Discogs\Dto\Database\Label;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Label>
 */
class LabelFactory extends BaseFactory
{
    public static function fromArray(array $data): Label
    {
        $label = new Label();

        $label->setId($data['id'] ?? null);
        $label->setName($data['name'] ?? null);
        $label->setResourceUrl($data['resource_url'] ?? null);
        $label->setUri($data['uri'] ?? null);
        $label->setReleasesUrl($data['releases_url'] ?? null);
        $label->setContactInfo($data['contact_info'] ?? null);
        $label->setProfile($data['profile'] ?? null);
        $label->setDataQuality($data['data_quality'] ?? null);
        $label->setUrls($data['urls'] ?? []);

        $label->setImages(array_map([ImageFactory::class, 'fromArray'], $data['images'] ?? []));
        $label->setSublabels(array_map([self::class, 'fromArray'], $data['sublabels'] ?? []));

        return $label;
    }
}
