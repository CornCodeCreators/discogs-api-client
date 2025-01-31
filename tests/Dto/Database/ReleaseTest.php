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

use CornCodeCreators\Discogs\Dto\Database\Artist;
use CornCodeCreators\Discogs\Dto\Database\Identifier;
use CornCodeCreators\Discogs\Dto\Database\Image;
use CornCodeCreators\Discogs\Dto\Database\Release;
use CornCodeCreators\Discogs\Dto\Database\ReleaseArtist;
use CornCodeCreators\Discogs\Dto\Database\ReleaseCommunity;
use CornCodeCreators\Discogs\Dto\Database\ReleaseCompany;
use CornCodeCreators\Discogs\Dto\Database\ReleaseFormat;
use CornCodeCreators\Discogs\Dto\Database\ReleaseLabel;
use CornCodeCreators\Discogs\Dto\Database\ReleaseVideo;
use CornCodeCreators\Discogs\Dto\Database\Track;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseTest extends BaseTestCase
{
    private Release $release;

    protected static function getClassname(): string
    {
        return Release::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->release = new Release();
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getTitle());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getTitle());
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->release->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getId());
    }

    public function testArtists(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getArtists());

        // ARRANGE
        $value = [
            new Artist(),
            new Artist(),
            new Artist(),
        ];

        // ACT
        $this->release->setArtists($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getArtists());
    }

    public function testDataQuality(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getDataQuality());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setDataQuality($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getDataQuality());
    }

    public function testThumb(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getThumb());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setThumb($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getThumb());
    }

    public function testCommunity(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getCommunity());

        // ARRANGE
        $value = new ReleaseCommunity();

        // ACT
        $this->release->setCommunity($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getCommunity());
    }

    public function testCompanies(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getCompanies());

        // ARRANGE
        $value = [
            new ReleaseCompany(),
            new ReleaseCompany(),
            new ReleaseCompany(),
            new ReleaseCompany(),
        ];

        // ACT
        $this->release->setCompanies($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getCompanies());
    }

    public function testCountry(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getCountry());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setCountry($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getCountry());
    }

    public function testDateAdded(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getDateAdded());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setDateAdded($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getDateAdded());
    }

    public function testDateChanged(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getDateChanged());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setDateChanged($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getDateChanged());
    }

    public function testEstimatedWeight(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getEstimatedWeight());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->release->setEstimatedWeight($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getEstimatedWeight());
    }

    public function testExtraArtists(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getExtraArtists());

        // ARRANGE
        $value = [
            new ReleaseArtist(),
            new ReleaseArtist(),
            new ReleaseArtist(),
        ];

        // ACT
        $this->release->setExtraArtists($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getExtraArtists());
    }

    public function testFormatQuantity(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getFormatQuantity());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->release->setFormatQuantity($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getFormatQuantity());
    }

    public function testFormats(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getFormats());

        // ARRANGE
        $value = [
            new ReleaseFormat(),
            new ReleaseFormat(),
            new ReleaseFormat(),
            new ReleaseFormat(),
        ];

        // ACT
        $this->release->setFormats($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getFormats());
    }

    public function testGenres(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getGenres());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->release->setGenres($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getGenres());
    }

    public function testIdentifiers(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getIdentifiers());

        // ARRANGE
        $value = [
            new Identifier(),
            new Identifier(),
            new Identifier(),
            new Identifier(),
        ];

        // ACT
        $this->release->setIdentifiers($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getIdentifiers());
    }

    public function testImages(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getImages());

        // ARRANGE
        $value = [
            new Image(),
            new Image(),
            new Image(),
            new Image(),
        ];

        // ACT
        $this->release->setImages($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getImages());
    }

    public function testLabels(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getLabels());

        // ARRANGE
        $value = [
            new ReleaseLabel(),
            new ReleaseLabel(),
            new ReleaseLabel(),
        ];

        // ACT
        $this->release->setLabels($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getLabels());
    }

    public function testLowestPrice(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getLowestPrice());

        // ARRANGE
        $value = $this->faker->randomFloat();

        // ACT
        $this->release->setLowestPrice($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getLowestPrice());
    }

    public function testMasterId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getMasterId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->release->setMasterId($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getMasterId());
    }

    public function testMasterUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getMasterUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->release->setMasterUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getMasterUrl());
    }

    public function testNotes(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getNotes());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setNotes($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getNotes());
    }

    public function testNumForSale(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getNumForSale());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->release->setNumForSale($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getNumForSale());
    }

    public function testReleasedAt(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getReleasedAt());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setReleasedAt($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getReleasedAt());
    }

    public function testReleasedAtFormatted(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getReleasedAtFormatted());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setReleasedAtFormatted($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getReleasedAtFormatted());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getResourceUrl());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getResourceUrl());
    }

    public function testSeries(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getSeries());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->release->setSeries($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getSeries());
    }

    public function testStatus(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getStatus());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setStatus($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getStatus());
    }

    public function testStyles(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getStyles());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->release->setStyles($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getStyles());
    }

    public function testTracks(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getTracks());

        // ARRANGE
        $value = [
            new Track(),
            new Track(),
            new Track(),
            new Track(),
        ];

        // ACT
        $this->release->setTracks($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getTracks());
    }

    public function testUri(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getUri());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setUri($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getUri());
    }

    public function testVideos(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getVideos());

        // ARRANGE
        $value = [
            new ReleaseVideo(),
            new ReleaseVideo(),
            new ReleaseVideo(),
            new ReleaseVideo(),
        ];

        // ACT
        $this->release->setVideos($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getVideos());
    }

    public function testYear(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getYear());

        // ARRANGE
        $value = $this->faker->numberBetween(1970, 2025);

        // ACT
        $this->release->setYear($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getYear());
    }

    public function testFormat(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->release->getFormat());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->release->setFormat($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getFormat());
    }

    public function testCatNo(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->release->getCatNo());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->release->setCatNo($value);

        // ASSERT
        $this->assertEquals($value, $this->release->getCatNo());
    }
}
