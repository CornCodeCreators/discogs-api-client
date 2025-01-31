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

class ReleaseFormat
{
    /** @var string[] */
    private array $descriptions = [];

    private ?string $name = null;

    private ?string $qty = null;

    /**
     * @return string[]
     */
    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    /**
     * @param string[] $descriptions
     */
    public function setDescriptions(array $descriptions): self
    {
        $this->descriptions = $descriptions;

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

    public function getQty(): ?string
    {
        return $this->qty;
    }

    public function setQty(?string $qty): self
    {
        $this->qty = $qty;

        return $this;
    }
}
