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

class Pagination
{
    private ?int $page = null;

    private ?int $pages = null;

    private ?int $perPage = null;

    private ?int $items = null;

    /**
     * @var string[]
     */
    private array $urls = [];

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(?int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    public function setPerPage(?int $perPage): self
    {
        $this->perPage = $perPage;

        return $this;
    }

    public function getItems(): ?int
    {
        return $this->items;
    }

    public function setItems(?int $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @param string[] $urls
     */
    public function setUrls(array $urls): self
    {
        $this->urls = $urls;

        return $this;
    }
}
