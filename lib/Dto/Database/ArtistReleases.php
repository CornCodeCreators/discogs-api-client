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

class ArtistReleases
{
    private Pagination $pagination;

    /**
     * @var ArtistRelease[]
     */
    private array $releases = [];

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): self
    {
        $this->pagination = $pagination;

        return $this;
    }

    /**
     * @return ArtistRelease[]
     */
    public function getReleases(): array
    {
        return $this->releases;
    }

    /**
     * @param ArtistRelease[] $releases
     */
    public function setReleases(array $releases): self
    {
        $this->releases = $releases;

        return $this;
    }
}
