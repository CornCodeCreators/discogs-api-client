<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Dto\User;

use CornCodeCreators\Discogs\Dto\Database\Pagination;

class ContributionsList
{
    private Pagination $pagination;

    /** @var array<string, mixed> */
    private array $contributions = [];

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): ContributionsList
    {
        $this->pagination = $pagination;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getContributions(): array
    {
        return $this->contributions;
    }

    /**
     * @param array<string, mixed> $contributions
     */
    public function setContributions(array $contributions): ContributionsList
    {
        $this->contributions = $contributions;

        return $this;
    }
}
