<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\Dto\Database;

use CornCodeCreators\Discogs\Dto\Database\Pagination;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class PaginationTest extends BaseTestCase
{
    private Pagination $pagination;

    protected static function getClassname(): string
    {
        return Pagination::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->pagination = new Pagination();
    }

    public function testPage(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->pagination->getPage());

        // ARRANGE
        $value = $this->faker->numberBetween(1, 100);

        // ACT
        $this->pagination->setPage($value);

        // ASSERT
        $this->assertEquals($value, $this->pagination->getPage());
    }

    public function testPages(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->pagination->getPages());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->pagination->setPages($value);

        // ASSERT
        $this->assertEquals($value, $this->pagination->getPages());
    }

    public function testPerPage(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->pagination->getPerPage());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->pagination->setPerPage($value);

        // ASSERT
        $this->assertEquals($value, $this->pagination->getPerPage());
    }

    public function testItems(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->pagination->getItems());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->pagination->setItems($value);

        // ASSERT
        $this->assertEquals($value, $this->pagination->getItems());
    }

    public function testUrls(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->pagination->getUrls());

        // ARRANGE
        $value = [
            $this->faker->url,
            $this->faker->url,
            $this->faker->url,
            $this->faker->url,
        ];

        // ACT
        $this->pagination->setUrls($value);

        // ASSERT
        $this->assertEquals($value, $this->pagination->getUrls());
    }
}
