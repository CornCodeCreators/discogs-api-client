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
use CornCodeCreators\Discogs\Dto\Database\Image;
use CornCodeCreators\Discogs\Dto\Database\Member;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ArtistTest extends BaseTestCase
{
    private Artist $artist;

    protected static function getClassname(): string
    {
        return Artist::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->artist = new Artist();
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(1000, 9999);

        // ACT
        $this->artist->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getId());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->artist->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getName());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getResourceUrl());
        
        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->artist->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getResourceUrl());
    }

    public function testUri(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getUri());
        
        // ARRANGE
        $value = $this->faker->url();

        // ACT
        $this->artist->setUri($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getUri());
    }

    public function testReleasesUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getReleasesUrl());
        
        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->artist->setReleasesUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getReleasesUrl());
    }

    public function testImages(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->artist->getImages());
        
        // ARRANGE
        $value = [
            new Image(),
            new Image(),
            new Image(),
        ];

        // ACT
        $this->artist->setImages($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getImages());
    }

    public function testProfile(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getProfile());
        
        // ARRANGE
        $value = $this->faker->userName;

        // ACT
        $this->artist->setProfile($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getProfile());
    }

    public function testUrls(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->artist->getUrls());
        
        // ARRANGE
        $value = [
            $this->faker->url,
            $this->faker->url,
            $this->faker->url,
        ];

        // ACT
        $this->artist->setUrls($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getUrls());
    }

    public function testNameVariations(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->artist->getNameVariations());
        
        // ARRANGE
        $value = [
            $this->faker->word,
            $this->faker->word,
            $this->faker->word,
            $this->faker->word,
        ];

        // ACT
        $this->artist->setNameVariations($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getNameVariations());
    }

    public function testMembers(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->artist->getMembers());
        
        // ARRANGE
        $value = [
            new Member(),
            new Member(),
            new Member(),
        ];

        // ACT
        $this->artist->setMembers($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getMembers());
    }

    public function testDataQuality(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->artist->getDataQuality());
        
        // ARRANGE
        $value = $this->faker->word;

        // ACT
        $this->artist->setDataQuality($value);

        // ASSERT
        $this->assertEquals($value, $this->artist->getDataQuality());
    }
}
