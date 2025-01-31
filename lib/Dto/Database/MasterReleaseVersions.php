<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Dto\Database;

class MasterReleaseVersions
{
    private Pagination $pagination;

    private Filters $filters;

    /**
     * @var FilterFacet[]
     */
    private array $filterFacets = [];

    /**
     * @var Versions[]
     */
    private array $versions = [];

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): self
    {
        $this->pagination = $pagination;

        return $this;
    }

    public function getFilters(): Filters
    {
        return $this->filters;
    }

    public function setFilters(Filters $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @return FilterFacet[]
     */
    public function getFilterFacets(): array
    {
        return $this->filterFacets;
    }

    /**
     * @param FilterFacet[] $filterFacets
     */
    public function setFilterFacets(array $filterFacets): self
    {
        $this->filterFacets = $filterFacets;

        return $this;
    }

    /**
     * @return Versions[]
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * @param Versions[] $versions
     */
    public function setVersions(array $versions): self
    {
        $this->versions = $versions;

        return $this;
    }
}
