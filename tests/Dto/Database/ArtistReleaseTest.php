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

use CornCodeCreators\Discogs\Dto\Database\ArtistRelease;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ArtistReleaseTest extends BaseTestCase
{
    private ArtistRelease $artistRelease;

    protected static function getClassname(): string
    {
        return ArtistRelease::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->artistRelease = new ArtistRelease();
    }
    
    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->artistRelease->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getId());
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getTitle());

        // ARRANGE
        $value = $this->faker->words(5, true);
        $this->assertIsString($value);

        // ACT
        $this->artistRelease->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getTitle());
    }

    public function testType(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getType());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->artistRelease->setType($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getType());
    }

    public function testMainRelease(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getMainRelease());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->artistRelease->setMainRelease($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getMainRelease());
    }

    public function testArtist(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getArtist());

        // ARRANGE
        $value = $this->faker->words(5, true);
        $this->assertIsString($value);

        // ACT
        $this->artistRelease->setArtist($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getArtist());
    }

    public function testRole(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getRole());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->artistRelease->setRole($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getRole());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->artistRelease->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getResourceUrl());
    }

    public function testYear(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getYear());

        // ARRANGE
        $value = $this->faker->numberBetween(1970, 2025);

        // ACT
        $this->artistRelease->setYear($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getYear());
    }

    public function testThumb(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artistRelease->getThumb());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->artistRelease->setThumb($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getThumb());
    }

    public function testStats(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->artistRelease->getStats());

        // ARRANGE
        $value = [
            $this->faker->name => [
                $this->faker->name => $this->faker->numberBetween(1, 100),
                $this->faker->name => $this->faker->numberBetween(1, 100),
                $this->faker->name => $this->faker->numberBetween(1, 100),
            ],
            $this->faker->name => [
                $this->faker->name => $this->faker->numberBetween(1, 100),
                $this->faker->name => $this->faker->numberBetween(1, 100),
                $this->faker->name => $this->faker->numberBetween(1, 100),
            ]];

        // ACT
        $this->artistRelease->setStats($value);

        // ASSERT
        $this->assertEquals($value, $this->artistRelease->getStats());
    }
}
