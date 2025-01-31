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

class ArtistRelease
{
    private ?int $id = null;

    private ?string $title = null;

    private ?string $type = null;

    private ?int $mainRelease = null;

    private ?string $artist = null;

    private ?string $role = null;

    private ?string $resourceUrl = null;

    private ?int $year = null;

    private ?string $thumb = null;

    /**
     * @var array<string, array<string, int>>
     */
    private array $stats = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMainRelease(): ?int
    {
        return $this->mainRelease;
    }

    public function setMainRelease(?int $mainRelease): self
    {
        $this->mainRelease = $mainRelease;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): self
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(?string $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return array<string, array<string, int>>
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @param array<string, array<string, int>> $stats
     */
    public function setStats(array $stats): self
    {
        $this->stats = $stats;

        return $this;
    }
}
