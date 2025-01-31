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

class ReleaseRatingByCommunity
{
    private ?int $releaseId = null;

    private ?ReleaseRating $rating = null;

    public function getReleaseId(): ?int
    {
        return $this->releaseId;
    }

    public function setReleaseId(?int $releaseId): self
    {
        $this->releaseId = $releaseId;

        return $this;
    }

    public function getRating(): ?ReleaseRating
    {
        return $this->rating;
    }

    public function setRating(?ReleaseRating $ratingDto): self
    {
        $this->rating = $ratingDto;

        return $this;
    }
}
