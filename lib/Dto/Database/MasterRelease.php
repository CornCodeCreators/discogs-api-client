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

class MasterRelease
{
    private ?int $id = null;

    private ?string $title = null;

    private ?string $dataQuality = null;

    private ?int $numForSale = null;

    private ?int $year = null;

    private ?float $lowestPrice = null;

    private ?int $mainRelease = null;

    private ?int $mostRecentRelease = null;

    private ?string $resourceUrl = null;

    private ?string $uri = null;

    private ?string $versionsUrl = null;

    private ?string $mainReleaseUrl = null;

    private ?string $mostRecentReleaseUrl = null;

    /**
     * @var Track[]
     */
    private array $tracks = [];

    /**
     * @var ReleaseArtist[]
     */
    private array $artists = [];

    /**
     * @var Image[]
     */
    private array $images = [];

    /**
     * @var string[]
     */
    private array $genres = [];

    /**
     * @var string[]
     */
    private array $styles = [];

    /**
     * @return string[]
     */
    public function getStyles(): array
    {
        return $this->styles;
    }

    /**
     * @param string[] $styles
     */
    public function setStyles(array $styles): self
    {
        $this->styles = $styles;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param string[] $genres
     */
    public function setGenres(array $genres): self
    {
        $this->genres = $genres;

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

    public function getMainRelease(): ?int
    {
        return $this->mainRelease;
    }

    public function setMainRelease(?int $mainRelease): self
    {
        $this->mainRelease = $mainRelease;

        return $this;
    }

    public function getMostRecentRelease(): ?int
    {
        return $this->mostRecentRelease;
    }

    public function setMostRecentRelease(?int $mostRecentRelease): self
    {
        $this->mostRecentRelease = $mostRecentRelease;

        return $this;
    }

    public function getMainReleaseUrl(): ?string
    {
        return $this->mainReleaseUrl;
    }

    public function setMainReleaseUrl(?string $mainReleaseUrl): self
    {
        $this->mainReleaseUrl = $mainReleaseUrl;

        return $this;
    }

    public function getMostRecentReleaseUrl(): ?string
    {
        return $this->mostRecentReleaseUrl;
    }

    public function setMostRecentReleaseUrl(?string $mostRecentReleaseUrl): self
    {
        $this->mostRecentReleaseUrl = $mostRecentReleaseUrl;

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

    /**
     * @return ReleaseArtist[]
     */
    public function getArtists(): array
    {
        return $this->artists;
    }

    /**
     * @param ReleaseArtist[] $artists
     */
    public function setArtists(array $artists): self
    {
        $this->artists = $artists;

        return $this;
    }

    public function getVersionsUrl(): ?string
    {
        return $this->versionsUrl;
    }

    public function setVersionsUrl(?string $versionsUrl): self
    {
        $this->versionsUrl = $versionsUrl;

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

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): self
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    /**
     * @return Track[]
     */
    public function getTracks(): array
    {
        return $this->tracks;
    }

    /**
     * @param Track[] $tracks
     */
    public function setTracks(array $tracks): self
    {
        $this->tracks = $tracks;

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

    public function getNumForSale(): ?int
    {
        return $this->numForSale;
    }

    public function setNumForSale(?int $numForSale): self
    {
        $this->numForSale = $numForSale;

        return $this;
    }

    public function getLowestPrice(): ?float
    {
        return $this->lowestPrice;
    }

    public function setLowestPrice(?float $lowestPrice): self
    {
        $this->lowestPrice = $lowestPrice;

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
