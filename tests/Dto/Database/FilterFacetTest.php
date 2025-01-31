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

use CornCodeCreators\Discogs\Dto\Database\FilterFacet;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class FilterFacetTest extends BaseTestCase
{
    private FilterFacet $filterFacet;

    protected static function getClassname(): string
    {
        return FilterFacet::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->filterFacet = new FilterFacet();
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->filterFacet->getId());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->filterFacet->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->filterFacet->getId());
    }
    
    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->filterFacet->getTitle());

        // ARRANGE
        $value = $this->faker->words(5, true);
        $this->assertIsString($value);

        // ACT
        $this->filterFacet->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->filterFacet->getTitle());
    }

    public function testValues(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->filterFacet->getValues());

        // ARRANGE
        $value = [
            [
                $this->faker->name => $this->faker->name,
                $this->faker->name => $this->faker->name,
                $this->faker->name => $this->faker->numberBetween(5, 20),
            ],
            [
                $this->faker->name => $this->faker->name,
                $this->faker->name => $this->faker->name,
                $this->faker->name => $this->faker->numberBetween(5, 20),
            ],
            [
                $this->faker->name => $this->faker->name,
                $this->faker->name => $this->faker->name,
                $this->faker->name => $this->faker->numberBetween(5, 20),
            ],
        ];

        // ACT
        $this->filterFacet->setValues($value);

        // ASSERT
        $this->assertEquals($value, $this->filterFacet->getValues());
    }

    public function testAllowsMultipleValues(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->filterFacet->getAllowsMultipleValues());

        // ARRANGE
        $value = $this->faker->boolean;

        // ACT
        $this->filterFacet->setAllowsMultipleValues($value);

        // ASSERT
        $this->assertEquals($value, $this->filterFacet->getAllowsMultipleValues());
    }
}
