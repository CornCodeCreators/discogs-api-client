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

class Profile
{
    private ?int $id = null;

    private ?string $resourceUrl = null;

    private ?string $uri = null;

    private ?string $username = null;

    private ?string $name = null;

    private ?string $homePage = null;

    private ?string $location = null;

    private ?string $profile = null;

    private ?string $registered = null;

    private float $rank;

    private ?int $numPending = null;

    private ?int $numForSale = null;

    private ?int $numLists = null;

    private ?int $releasesContributed = null;

    private ?int $releasesRated = null;

    private float $ratingAvg;

    private ?string $inventoryUrl = null;

    private ?string $collectionFoldersUrl = null;

    private ?string $collectionFieldsUrl = null;

    private ?string $wantlistUrl = null;

    private ?string $avatarUrl = null;

    private ?string $currAbbr = null;

    private bool $activated;

    private bool $marketplaceSuspended;

    private ?string $bannerUrl = null;

    private float $buyerRating;

    private float $buyerRatingStars;

    private ?int $buyerNumRatings = null;

    private float $sellerRating;

    private float $sellerRatingStars;

    private ?int $sellerNumRatings = null;

    private bool $isStaff;

    private ?int $numCollection = null;

    private ?int $numWantlist = null;

    private ?string $email = null;

    private ?int $numUnread = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Profile
    {
        $this->id = $id;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): Profile
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(?string $uri): Profile
    {
        $this->uri = $uri;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): Profile
    {
        $this->username = $username;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Profile
    {
        $this->name = $name;

        return $this;
    }

    public function getHomePage(): ?string
    {
        return $this->homePage;
    }

    public function setHomePage(?string $homePage): Profile
    {
        $this->homePage = $homePage;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): Profile
    {
        $this->location = $location;

        return $this;
    }

    public function getProfile(): ?string
    {
        return $this->profile;
    }

    public function setProfile(?string $profile): Profile
    {
        $this->profile = $profile;

        return $this;
    }

    public function getRegistered(): ?string
    {
        return $this->registered;
    }

    public function setRegistered(?string $registered): Profile
    {
        $this->registered = $registered;

        return $this;
    }

    public function getRank(): float
    {
        return $this->rank;
    }

    public function setRank(float $rank): Profile
    {
        $this->rank = $rank;

        return $this;
    }

    public function getNumPending(): ?int
    {
        return $this->numPending;
    }

    public function setNumPending(?int $numPending): Profile
    {
        $this->numPending = $numPending;

        return $this;
    }

    public function getNumForSale(): ?int
    {
        return $this->numForSale;
    }

    public function setNumForSale(?int $numForSale): Profile
    {
        $this->numForSale = $numForSale;

        return $this;
    }

    public function getNumLists(): ?int
    {
        return $this->numLists;
    }

    public function setNumLists(?int $numLists): Profile
    {
        $this->numLists = $numLists;

        return $this;
    }

    public function getReleasesContributed(): ?int
    {
        return $this->releasesContributed;
    }

    public function setReleasesContributed(?int $releasesContributed): Profile
    {
        $this->releasesContributed = $releasesContributed;

        return $this;
    }

    public function getReleasesRated(): ?int
    {
        return $this->releasesRated;
    }

    public function setReleasesRated(?int $releasesRated): Profile
    {
        $this->releasesRated = $releasesRated;

        return $this;
    }

    public function getRatingAvg(): float
    {
        return $this->ratingAvg;
    }

    public function setRatingAvg(float $ratingAvg): Profile
    {
        $this->ratingAvg = $ratingAvg;

        return $this;
    }

    public function getInventoryUrl(): ?string
    {
        return $this->inventoryUrl;
    }

    public function setInventoryUrl(?string $inventoryUrl): Profile
    {
        $this->inventoryUrl = $inventoryUrl;

        return $this;
    }

    public function getCollectionFoldersUrl(): ?string
    {
        return $this->collectionFoldersUrl;
    }

    public function setCollectionFoldersUrl(?string $collectionFoldersUrl): Profile
    {
        $this->collectionFoldersUrl = $collectionFoldersUrl;

        return $this;
    }

    public function getCollectionFieldsUrl(): ?string
    {
        return $this->collectionFieldsUrl;
    }

    public function setCollectionFieldsUrl(?string $collectionFieldsUrl): Profile
    {
        $this->collectionFieldsUrl = $collectionFieldsUrl;

        return $this;
    }

    public function getWantlistUrl(): ?string
    {
        return $this->wantlistUrl;
    }

    public function setWantlistUrl(?string $wantlistUrl): Profile
    {
        $this->wantlistUrl = $wantlistUrl;

        return $this;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(?string $avatarUrl): Profile
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function getCurrAbbr(): ?string
    {
        return $this->currAbbr;
    }

    public function setCurrAbbr(?string $currAbbr): Profile
    {
        $this->currAbbr = $currAbbr;

        return $this;
    }

    public function isActivated(): bool
    {
        return $this->activated;
    }

    public function setActivated(bool $activated): Profile
    {
        $this->activated = $activated;

        return $this;
    }

    public function isMarketplaceSuspended(): bool
    {
        return $this->marketplaceSuspended;
    }

    public function setMarketplaceSuspended(bool $marketplaceSuspended): Profile
    {
        $this->marketplaceSuspended = $marketplaceSuspended;

        return $this;
    }

    public function getBannerUrl(): ?string
    {
        return $this->bannerUrl;
    }

    public function setBannerUrl(?string $bannerUrl): Profile
    {
        $this->bannerUrl = $bannerUrl;

        return $this;
    }

    public function getBuyerRating(): float
    {
        return $this->buyerRating;
    }

    public function setBuyerRating(float $buyerRating): Profile
    {
        $this->buyerRating = $buyerRating;

        return $this;
    }

    public function getBuyerRatingStars(): float
    {
        return $this->buyerRatingStars;
    }

    public function setBuyerRatingStars(float $buyerRatingStars): Profile
    {
        $this->buyerRatingStars = $buyerRatingStars;

        return $this;
    }

    public function getBuyerNumRatings(): ?int
    {
        return $this->buyerNumRatings;
    }

    public function setBuyerNumRatings(?int $buyerNumRatings): Profile
    {
        $this->buyerNumRatings = $buyerNumRatings;

        return $this;
    }

    public function getSellerRating(): float
    {
        return $this->sellerRating;
    }

    public function setSellerRating(float $sellerRating): Profile
    {
        $this->sellerRating = $sellerRating;

        return $this;
    }

    public function getSellerRatingStars(): float
    {
        return $this->sellerRatingStars;
    }

    public function setSellerRatingStars(float $sellerRatingStars): Profile
    {
        $this->sellerRatingStars = $sellerRatingStars;

        return $this;
    }

    public function getSellerNumRatings(): ?int
    {
        return $this->sellerNumRatings;
    }

    public function setSellerNumRatings(?int $sellerNumRatings): Profile
    {
        $this->sellerNumRatings = $sellerNumRatings;

        return $this;
    }

    public function isStaff(): bool
    {
        return $this->isStaff;
    }

    public function setIsStaff(bool $isStaff): Profile
    {
        $this->isStaff = $isStaff;

        return $this;
    }

    public function getNumCollection(): ?int
    {
        return $this->numCollection;
    }

    public function setNumCollection(?int $numCollection): Profile
    {
        $this->numCollection = $numCollection;

        return $this;
    }

    public function getNumWantlist(): ?int
    {
        return $this->numWantlist;
    }

    public function setNumWantlist(?int $numWantlist): Profile
    {
        $this->numWantlist = $numWantlist;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Profile
    {
        $this->email = $email;

        return $this;
    }

    public function getNumUnread(): ?int
    {
        return $this->numUnread;
    }

    public function setNumUnread(?int $numUnread): Profile
    {
        $this->numUnread = $numUnread;

        return $this;
    }
}
