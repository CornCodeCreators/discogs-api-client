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

use CornCodeCreators\Discogs\Dto\Database\Versions;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class VersionsTest extends BaseTestCase
{
    private Versions $versions;

    protected static function getClassname(): string
    {
        return Versions::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->versions = new Versions();
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->versions->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getId());
    }

    public function testLabel(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getLabel());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setLabel($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getLabel());
    }

    public function testCountry(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getCountry());

        // ARRANGE
        $value = $this->faker->countryCode;

        // ACT
        $this->versions->setCountry($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getCountry());
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getTitle());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getTitle());
    }

    public function testMajorFormats(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->versions->getMajorFormats());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->versions->setMajorFormats($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getMajorFormats());
    }

    public function testFormat(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getFormat());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setFormat($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getFormat());
    }

    public function testCatNo(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getCatNo());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setCatNo($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getCatNo());
    }

    public function testReleased(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getReleased());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setReleased($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getReleased());
    }

    public function testStatus(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getStatus());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setStatus($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getStatus());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->versions->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getResourceUrl());
    }

    public function testThumb(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->versions->getThumb());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->versions->setThumb($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getThumb());
    }

    public function testStats(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->versions->getStats());

        // ARRANGE
        $value = [
            $this->faker->name => [
                $this->faker->name => $this->faker->numberBetween(100, 500),
                $this->faker->name => $this->faker->numberBetween(100, 500),
            ],
            $this->faker->name => [
                $this->faker->name => $this->faker->numberBetween(100, 500),
                $this->faker->name => $this->faker->numberBetween(100, 500),
            ],
        ];

        // ACT
        $this->versions->setStats($value);

        // ASSERT
        $this->assertEquals($value, $this->versions->getStats());
    }
}
