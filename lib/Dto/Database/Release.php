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

class Release
{
    private ?int $id = null;

    private ?string $title = null;

    private ?string $dataQuality = null;

    private ?string $thumb = null;

    private ?string $country = null;

    private ?string $dateAdded = null;

    private ?string $dateChanged = null;

    private ?int $estimatedWeight = null;

    private ?int $formatQuantity = null;

    private ?float $lowestPrice = null;

    private ?int $masterId = null;

    private ?string $masterUrl = null;

    private ?string $notes = null;

    private ?int $numForSale = null;

    private ?string $releasedAt = null;

    private ?string $releasedAtFormatted = null;

    private ?string $resourceUrl = null;

    private ?string $status = null;

    private ?string $uri = null;

    private ?int $year = null;

    private ?ReleaseCommunity $community = null;

    /** @var string[] */
    private array $genres = [];

    /** @var string[] */
    private array $series = [];

    /** @var string[] */
    private array $styles = [];

    /** @var ReleaseArtist[]|Artist[] */
    private array $artists = [];

    /** @var ReleaseArtist[] */
    private array $extraArtists = [];

    /** @var ReleaseCompany[] */
    private array $companies = [];

    /** @var ReleaseLabel[] */
    private array $labels = [];

    /** @var string[] */
    private array $format = [];

    /** @var ReleaseFormat[] */
    private array $formats = [];

    /** @var Identifier[] */
    private array $identifiers = [];

    /** @var Track[] */
    private array $tracks = [];

    /** @var Image[] */
    private array $images = [];

    /** @var ReleaseVideo[] */
    private array $videos = [];

    private ?string $catNo = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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

    /**
     * @return array<ReleaseArtist>|Artist[]
     */
    public function getArtists(): array
    {
        return $this->artists;
    }

    /**
     * @param array<ReleaseArtist>|Artist[] $artists
     */
    public function setArtists(array $artists): self
    {
        $this->artists = $artists;

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

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(?string $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    public function getCommunity(): ?ReleaseCommunity
    {
        return $this->community;
    }

    public function setCommunity(?ReleaseCommunity $community): self
    {
        $this->community = $community;

        return $this;
    }

    /**
     * @return ReleaseCompany[]
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @param ReleaseCompany[] $companies
     */
    public function setCompanies(array $companies): self
    {
        $this->companies = $companies;

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

    public function getDateAdded(): ?string
    {
        return $this->dateAdded;
    }

    public function setDateAdded(?string $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getDateChanged(): ?string
    {
        return $this->dateChanged;
    }

    public function setDateChanged(?string $dateChanged): self
    {
        $this->dateChanged = $dateChanged;

        return $this;
    }

    public function getEstimatedWeight(): ?int
    {
        return $this->estimatedWeight;
    }

    public function setEstimatedWeight(?int $estimatedWeight): self
    {
        $this->estimatedWeight = $estimatedWeight;

        return $this;
    }

    /**
     * @return ReleaseArtist[]
     */
    public function getExtraArtists(): array
    {
        return $this->extraArtists;
    }

    /**
     * @param ReleaseArtist[] $extraArtists
     */
    public function setExtraArtists(array $extraArtists): self
    {
        $this->extraArtists = $extraArtists;

        return $this;
    }

    public function getFormatQuantity(): ?int
    {
        return $this->formatQuantity;
    }

    public function setFormatQuantity(?int $formatQuantity): self
    {
        $this->formatQuantity = $formatQuantity;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getFormat(): array
    {
        return $this->format;
    }

    /**
     * @param string[] $format
     */
    public function setFormat(array $format): void
    {
        $this->format = $format;
    }

    /**
     * @return ReleaseFormat[]
     */
    public function getFormats(): array
    {
        return $this->formats;
    }

    /**
     * @param ReleaseFormat[] $formats
     */
    public function setFormats(array $formats): self
    {
        $this->formats = $formats;

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

    /**
     * @return Identifier[]
     */
    public function getIdentifiers(): array
    {
        return $this->identifiers;
    }

    /**
     * @param Identifier[] $identifiers
     */
    public function setIdentifiers(array $identifiers): self
    {
        $this->identifiers = $identifiers;

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

    /**
     * @return ReleaseLabel[]
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param ReleaseLabel[] $labels
     */
    public function setLabels(array $labels): self
    {
        $this->labels = $labels;

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

    public function getMasterId(): ?int
    {
        return $this->masterId;
    }

    public function setMasterId(?int $masterId): self
    {
        $this->masterId = $masterId;

        return $this;
    }

    public function getMasterUrl(): ?string
    {
        return $this->masterUrl;
    }

    public function setMasterUrl(?string $masterUrl): self
    {
        $this->masterUrl = $masterUrl;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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

    public function getReleasedAt(): ?string
    {
        return $this->releasedAt;
    }

    public function setReleasedAt(?string $releasedAt): self
    {
        $this->releasedAt = $releasedAt;

        return $this;
    }

    public function getReleasedAtFormatted(): ?string
    {
        return $this->releasedAtFormatted;
    }

    public function setReleasedAtFormatted(?string $releasedAtFormatted): self
    {
        $this->releasedAtFormatted = $releasedAtFormatted;

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
     * @return string[]
     */
    public function getSeries(): array
    {
        return $this->series;
    }

    /**
     * @param string[] $series
     */
    public function setSeries(array $series): self
    {
        $this->series = $series;

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
     * @return ReleaseVideo[]
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    /**
     * @param ReleaseVideo[] $videos
     */
    public function setVideos(array $videos): self
    {
        $this->videos = $videos;

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

    public function getCatNo(): ?string
    {
        return $this->catNo;
    }

    public function setCatNo(?string $catNo): self
    {
        $this->catNo = $catNo;

        return $this;
    }
}
