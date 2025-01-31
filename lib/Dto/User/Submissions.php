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

class Submissions
{
    /** @var array<string, mixed> */
    private array $releases = [];

    /** @var array<string, mixed> */
    private array $artists = [];

    /** @var array<string, mixed> */
    private array $labels = [];

    /**
     * @return array<string, mixed>
     */
    public function getReleases(): array
    {
        return $this->releases;
    }

    /**
     * @param array<string, mixed> $releases
     */
    public function setReleases(array $releases): Submissions
    {
        $this->releases = $releases;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getArtists(): array
    {
        return $this->artists;
    }

    /**
     * @param array<string, mixed> $artists
     */
    public function setArtists(array $artists): Submissions
    {
        $this->artists = $artists;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param array<string, mixed> $labels
     */
    public function setLabels(array $labels): Submissions
    {
        $this->labels = $labels;

        return $this;
    }
}
