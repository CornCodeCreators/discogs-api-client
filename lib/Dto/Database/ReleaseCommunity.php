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

class ReleaseCommunity
{
    private ?string $status = null;

    private ?string $dataQuality = null;

    private ?int $want = null;

    private ?int $have = null;

    /** @var Contributor[] */
    private array $contributors = [];

    private ?ReleaseRating $rating = null;

    private ?Submitter $submitter = null;

    /**
     * @return Contributor[]
     */
    public function getContributors(): array
    {
        return $this->contributors;
    }

    /**
     * @param Contributor[] $contributors
     */
    public function setContributors(array $contributors): self
    {
        $this->contributors = $contributors;

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

    public function getHave(): ?int
    {
        return $this->have;
    }

    public function setHave(?int $have): self
    {
        $this->have = $have;

        return $this;
    }

    public function getRating(): ?ReleaseRating
    {
        return $this->rating;
    }

    public function setRating(?ReleaseRating $rating): self
    {
        $this->rating = $rating;

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

    public function getSubmitter(): ?Submitter
    {
        return $this->submitter;
    }

    public function setSubmitter(?Submitter $submitter): self
    {
        $this->submitter = $submitter;

        return $this;
    }

    public function getWant(): ?int
    {
        return $this->want;
    }

    public function setWant(?int $want): self
    {
        $this->want = $want;

        return $this;
    }
}
