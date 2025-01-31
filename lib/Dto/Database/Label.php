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

class Label
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $resourceUrl = null;

    private ?string $uri = null;

    private ?string $releasesUrl = null;

    /**
     * @var Image[]
     */
    private array $images = [];

    private ?string $contactInfo = null;

    private ?string $profile = null;

    private ?string $dataQuality = null;

    /**
     * @var string[]
     */
    private array $urls = [];

    /**
     * @var Label[]
     */
    private array $sublabels = [];

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
     * @return Image[]
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

    public function getContactInfo(): ?string
    {
        return $this->contactInfo;
    }

    public function setContactInfo(?string $contactInfo): self
    {
        $this->contactInfo = $contactInfo;

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

    public function getDataQuality(): ?string
    {
        return $this->dataQuality;
    }

    public function setDataQuality(?string $dataQuality): self
    {
        $this->dataQuality = $dataQuality;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @param string[] $urls
     */
    public function setUrls(array $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @return Label[]
     */
    public function getSublabels(): array
    {
        return $this->sublabels;
    }

    /**
     * @param Label[] $sublabels
     */
    public function setSublabels(array $sublabels): self
    {
        $this->sublabels = $sublabels;

        return $this;
    }
}
