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

use CornCodeCreators\Discogs\Dto\Database\FilterFacet;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<FilterFacet>
 */
class FilterFacetFactory extends BaseFactory
{
    public static function fromArray(array $data): FilterFacet
    {
        $facet = new FilterFacet();

        $facet->setTitle($data['title']);
        $facet->setId($data['id']);
        $facet->setValues($data['values']);
        $facet->setAllowsMultipleValues($data['allows_multiple_values']);

        return $facet;
    }
}
