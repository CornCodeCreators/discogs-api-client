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

class SearchResults
{
    private Pagination $pagination;

    /** @var array<int, mixed> */
    private array $results;

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): void
    {
        $this->pagination = $pagination;
    }

    /**
     * @return array<int, mixed>
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param array<int, mixed> $results
     */
    public function setResults(array $results): void
    {
        $this->results = $results;
    }
}
