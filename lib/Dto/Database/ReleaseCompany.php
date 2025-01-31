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

class ReleaseCompany
{
    private ?int $id = null;

    private ?string $name = null;

    private ?string $catNo = null;

    private ?string $entityType = null;

    private ?string $entityTypeName = null;

    private ?string $resourceUrl = null;

    public function getCatNo(): ?string
    {
        return $this->catNo;
    }

    public function setCatNo(?string $catNo): self
    {
        $this->catNo = $catNo;

        return $this;
    }

    public function getEntityType(): ?string
    {
        return $this->entityType;
    }

    public function setEntityType(?string $entityType): self
    {
        $this->entityType = $entityType;

        return $this;
    }

    public function getEntityTypeName(): ?string
    {
        return $this->entityTypeName;
    }

    public function setEntityTypeName(?string $entityTypeName): self
    {
        $this->entityTypeName = $entityTypeName;

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
}
