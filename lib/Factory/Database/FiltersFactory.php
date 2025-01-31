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

use CornCodeCreators\Discogs\Dto\Database\Filters;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Filters>
 */
class FiltersFactory extends BaseFactory
{
    public static function fromArray(array $data): Filters
    {
        $filters = new Filters();

        $filters->setApplied($data['applied'] ?? []);
        $filters->setAvailable($data['available'] ?? []);

        return $filters;
    }
}
