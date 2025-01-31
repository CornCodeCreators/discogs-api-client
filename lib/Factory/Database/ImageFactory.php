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

use CornCodeCreators\Discogs\Dto\Database\Image;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Image>
 */
class ImageFactory extends BaseFactory
{
    public static function fromArray(array $data): Image
    {
        $image = new Image();

        $image->setHeight($data['height'] ?? null);
        $image->setResourceUrl($data['resource_url'] ?? null);
        $image->setType($data['type'] ?? null);
        $image->setUri($data['uri'] ?? null);
        $image->setUri150($data['uri150'] ?? null);
        $image->setWidth($data['width'] ?? null);

        return $image;
    }
}
