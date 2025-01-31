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

use CornCodeCreators\Discogs\Dto\Database\ReleaseArtist;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseArtistTest extends BaseTestCase
{
    private ReleaseArtist $releaseArtist;

    protected static function getClassname(): string
    {
        return ReleaseArtist::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseArtist = new ReleaseArtist();
    }

    public function testAnv(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getAnv());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseArtist->setAnv($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getAnv());
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->releaseArtist->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getId());
    }

    public function testJoin(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getJoin());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseArtist->setJoin($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getJoin());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseArtist->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getName());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->releaseArtist->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getResourceUrl());
    }

    public function testRole(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getRole());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseArtist->setRole($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getRole());
    }

    public function testTracks(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseArtist->getTracks());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseArtist->setTracks($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseArtist->getTracks());
    }
}
