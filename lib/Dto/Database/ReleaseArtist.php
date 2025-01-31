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

class ReleaseArtist
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $anv = null;

    private ?string $join = null;

    private ?string $resourceUrl = null;

    private ?string $role = null;

    private ?string $tracks = null;

    public function getAnv(): ?string
    {
        return $this->anv;
    }

    public function setAnv(?string $anv): self
    {
        $this->anv = $anv;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getJoin(): ?string
    {
        return $this->join;
    }

    public function setJoin(?string $join): self
    {
        $this->join = $join;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getTracks(): ?string
    {
        return $this->tracks;
    }

    public function setTracks(?string $tracks): self
    {
        $this->tracks = $tracks;

        return $this;
    }
}
