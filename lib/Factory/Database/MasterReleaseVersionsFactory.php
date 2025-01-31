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

use CornCodeCreators\Discogs\Dto\Database\MasterReleaseVersions;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<MasterReleaseVersions>
 */
class MasterReleaseVersionsFactory extends BaseFactory
{
    public static function fromArray(array $data): MasterReleaseVersions
    {
        $masterReleaseVersions = new MasterReleaseVersions();

        $masterReleaseVersions->setPagination(PaginationFactory::fromArray($data['pagination'] ?? []));
        $masterReleaseVersions->setFilters(FiltersFactory::fromArray($data['filters'] ?? []));
        $masterReleaseVersions->setFilterFacets(array_map([FilterFacetFactory::class, 'fromArray'], $data['filter_facets'] ?? []));
        $masterReleaseVersions->setVersions(array_map([VersionsFactory::class, 'fromArray'], $data['versions'] ?? []));

        return $masterReleaseVersions;
    }
}
