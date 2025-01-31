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

class Versions
{
    private ?int $id = null;

    private ?string $label = null;

    private ?string $country = null;

    private ?string $title = null;

    /** @var string[] */
    private array $majorFormats = [];

    private ?string $format = null;

    private ?string $catNo = null;

    private ?string $released = null;

    private ?string $status = null;

    private ?string $resourceUrl = null;

    private ?string $thumb = null;

    /** @var array<string, mixed> */
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

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

    /**
     * @return string[]
     */
    public function getMajorFormats(): array
    {
        return $this->majorFormats;
    }

    /**
     * @param string[] $majorFormats
     */
    public function setMajorFormats(array $majorFormats): self
    {
        $this->majorFormats = $majorFormats;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getCatNo(): ?string
    {
        return $this->catNo;
    }

    public function setCatNo(?string $catNo): self
    {
        $this->catNo = $catNo;

        return $this;
    }

    public function getReleased(): ?string
    {
        return $this->released;
    }

    public function setReleased(?string $released): self
    {
        $this->released = $released;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

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
     * @return array<string, mixed>
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @param array<string, mixed> $stats
     */
    public function setStats(array $stats): self
    {
        $this->stats = $stats;

        return $this;
    }
}
