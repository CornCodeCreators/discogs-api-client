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

class ReleaseStats
{
    private ?int $numHave = null;

    private ?int $numWant = null;

    public function getNumHave(): ?int
    {
        return $this->numHave;
    }

    public function setNumHave(?int $numHave): self
    {
        $this->numHave = $numHave;

        return $this;
    }

    public function getNumWant(): ?int
    {
        return $this->numWant;
    }

    public function setNumWant(?int $numWant): self
    {
        $this->numWant = $numWant;

        return $this;
    }
}
