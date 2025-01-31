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

use CornCodeCreators\Discogs\Dto\Database\ReleaseLabel;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseLabel>
 */
class ReleaseLabelFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseLabel
    {
        $label = new ReleaseLabel();
        $label->setCatNo($data['catno'] ?? null);
        $label->setEntityType($data['entity_type'] ?? null);
        $label->setId($data['id'] ?? null);
        $label->setName($data['name'] ?? null);
        $label->setResourceUrl($data['resource_url'] ?? null);

        return $label;
    }
}
