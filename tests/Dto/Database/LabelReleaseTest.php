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

use CornCodeCreators\Discogs\Dto\Database\LabelRelease;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class LabelReleaseTest extends BaseTestCase
{
    private LabelRelease $labelRelease;

    protected static function getClassname(): string
    {
        return LabelRelease::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->labelRelease = new LabelRelease();
    }

    public function testStatus(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getStatus());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->labelRelease->setStatus($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getStatus());
    }

    public function testFormat(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getFormat());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->labelRelease->setFormat($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getFormat());
    }

    public function testCatNo(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getCatNo());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->labelRelease->setCatNo($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getCatNo());
    }

    public function testThumb(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getThumb());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->labelRelease->setThumb($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getThumb());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->labelRelease->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getResourceUrl());
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getTitle());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->labelRelease->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getTitle());
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->labelRelease->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getId());
    }

    public function testYear(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getYear());

        // ARRANGE
        $value = $this->faker->numberBetween(1970, 2025);

        // ACT
        $this->labelRelease->setYear($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getYear());
    }

    public function testArtist(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->labelRelease->getArtist());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->labelRelease->setArtist($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getArtist());
    }

    public function testStats(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->labelRelease->getStats());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->labelRelease->setStats($value);

        // ASSERT
        $this->assertEquals($value, $this->labelRelease->getStats());
    }
}
