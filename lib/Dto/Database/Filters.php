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

class Filters
{
    /**
     * @var string[]
     */
    private array $applied = [];

    /**
     * @var string[]
     */
    private array $available = [];

    /**
     * @return string[]
     */
    public function getApplied(): array
    {
        return $this->applied;
    }

    /**
     * @param string[] $applied
     */
    public function setApplied(array $applied): self
    {
        $this->applied = $applied;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAvailable(): array
    {
        return $this->available;
    }

    /**
     * @param string[] $available
     */
    public function setAvailable(array $available): self
    {
        $this->available = $available;

        return $this;
    }
}
