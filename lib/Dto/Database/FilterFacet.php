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

class FilterFacet
{
    private ?string $title = null;

    private ?string $id = null; // yes, it is a string!

    /**
     * @var array<int, array<string, int|string>>
     */
    private array $values = [];

    private ?bool $allowsMultipleValues = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getId(): ?string // yes, it is a string!
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array<int, array<string, int|string>>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<int, array<string, int|string>> $values
     */
    public function setValues(array $values): self
    {
        $this->values = $values;

        return $this;
    }

    public function getAllowsMultipleValues(): ?bool
    {
        return $this->allowsMultipleValues;
    }

    public function setAllowsMultipleValues(?bool $allowsMultipleValues): self
    {
        $this->allowsMultipleValues = $allowsMultipleValues;

        return $this;
    }
}
