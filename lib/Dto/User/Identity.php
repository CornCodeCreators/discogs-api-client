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

class Identity
{
    private ?int $id = null;

    private string $username; // shall not be null

    private ?string $resourceUrl = null;

    private ?string $consumerName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Identity
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Identity
    {
        $this->username = $username;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): Identity
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    public function getConsumerName(): ?string
    {
        return $this->consumerName;
    }

    public function setConsumerName(?string $consumerName): Identity
    {
        $this->consumerName = $consumerName;

        return $this;
    }
}
