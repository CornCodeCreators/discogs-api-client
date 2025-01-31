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

use CornCodeCreators\Discogs\Dto\Database\Image;
use CornCodeCreators\Discogs\Dto\Database\MasterRelease;
use CornCodeCreators\Discogs\Dto\Database\ReleaseArtist;
use CornCodeCreators\Discogs\Dto\Database\Track;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class MasterReleaseTest extends BaseTestCase
{
    private MasterRelease $masterRelease;

    protected static function getClassname(): string
    {
        return MasterRelease::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->masterRelease = new MasterRelease();
    }

    public function testStyles(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->masterRelease->getStyles());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->masterRelease->setStyles($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getStyles());
    }

    public function testGenres(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->masterRelease->getGenres());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->masterRelease->setGenres($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getGenres());
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getTitle());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->masterRelease->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getTitle());
    }

    public function testMainRelease(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getMainRelease());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->masterRelease->setMainRelease($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getMainRelease());
    }

    public function testMostRecentRelease(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getMostRecentRelease());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->masterRelease->setMostRecentRelease($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getMostRecentRelease());
    }

    public function testMainReleaseUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getMainReleaseUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->masterRelease->setMainReleaseUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getMainReleaseUrl());
    }

    public function testMostRecentReleaseUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getMostRecentReleaseUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->masterRelease->setMostRecentReleaseUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getMostRecentReleaseUrl());
    }

    public function testUri(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getUri());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->masterRelease->setUri($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getUri());
    }

    public function testArtists(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->masterRelease->getArtists());

        // ARRANGE
        $value = [
            new ReleaseArtist(),
            new ReleaseArtist(),
            new ReleaseArtist(),
            new ReleaseArtist(),
        ];

        // ACT
        $this->masterRelease->setArtists($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getArtists());
    }

    public function testVersionsUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getVersionsUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->masterRelease->setVersionsUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getVersionsUrl());
    }

    public function testYear(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getYear());

        // ARRANGE
        $value = $this->faker->numberBetween(1970, 2025);

        // ACT
        $this->masterRelease->setYear($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getYear());
    }

    public function testImages(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->masterRelease->getImages());

        // ARRANGE
        $value = [
            new Image(),
            new Image(),
            new Image(),
            new Image(),
        ];

        // ACT
        $this->masterRelease->setImages($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getImages());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->masterRelease->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getResourceUrl());
    }

    public function testTracks(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->masterRelease->getTracks());

        // ARRANGE
        $value = [
            new Track(),
            new Track(),
            new Track(),
            new Track(),
        ];

        // ACT
        $this->masterRelease->setTracks($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getTracks());
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->masterRelease->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getId());
    }

    public function testNumForSale(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getNumForSale());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->masterRelease->setNumForSale($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getNumForSale());
    }

    public function testLowestPrice(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getLowestPrice());

        // ARRANGE
        $value = $this->faker->randomFloat();

        // ACT
        $this->masterRelease->setLowestPrice($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getLowestPrice());
    }

    public function testDataQuality(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->masterRelease->getDataQuality());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->masterRelease->setDataQuality($value);

        // ASSERT
        $this->assertEquals($value, $this->masterRelease->getDataQuality());
    }
}
