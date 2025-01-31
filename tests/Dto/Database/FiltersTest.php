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

use CornCodeCreators\Discogs\Dto\Database\Filters;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class FiltersTest extends BaseTestCase
{
    private Filters $filters;

    protected static function getClassname(): string
    {
        return Filters::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->filters = new Filters();
    }

    public function testApplied(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->filters->getApplied());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->filters->setApplied($value);

        // ASSERT
        $this->assertEquals($value, $this->filters->getApplied());
    }

    public function testAvailable(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->filters->getAvailable());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->filters->setAvailable($value);

        // ASSERT
        $this->assertEquals($value, $this->filters->getAvailable());
    }
}
