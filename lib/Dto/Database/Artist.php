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

class Artist
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $resourceUrl = null;

    private ?string $uri = null;

    private ?string $releasesUrl = null;

    /**
     * @var array<string, mixed>
     */
    private array $images = [];

    private ?string $profile = null;

    /**
     * @var array<int, string>
     */
    private array $urls = [];

    /**
     * @var array<int, string>
     */
    private array $nameVariations = [];

    /**
     * @var array<string, mixed>
     */
    private array $members = [];

    private ?string $dataQuality = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

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

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(?string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getReleasesUrl(): ?string
    {
        return $this->releasesUrl;
    }

    public function setReleasesUrl(?string $releasesUrl): self
    {
        $this->releasesUrl = $releasesUrl;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     */
    public function setImages(array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @param array<int, string> $urls
     */
    public function setUrls(array $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getNameVariations(): array
    {
        return $this->nameVariations;
    }

    /**
     * @param array<int, string> $nameVariations
     */
    public function setNameVariations(array $nameVariations): self
    {
        $this->nameVariations = $nameVariations;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * @param Member[] $members
     */
    public function setMembers(array $members): self
    {
        $this->members = $members;

        return $this;
    }

    public function getDataQuality(): ?string
    {
        return $this->dataQuality;
    }

    public function setDataQuality(?string $dataQuality): self
    {
        $this->dataQuality = $dataQuality;

        return $this;
    }
}
