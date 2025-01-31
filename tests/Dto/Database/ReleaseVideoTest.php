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

use CornCodeCreators\Discogs\Dto\Database\ReleaseVideo;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseVideoTest extends BaseTestCase
{
    private ReleaseVideo $releaseVideo;

    protected static function getClassname(): string
    {
        return ReleaseVideo::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseVideo = new ReleaseVideo();
    }

    public function testDescription(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseVideo->getDescription());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseVideo->setDescription($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseVideo->getDescription());
    }

    public function testDuration(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseVideo->getDuration());

        // ARRANGE
        $value = $this->faker->numberBetween(50, 200);

        // ACT
        $this->releaseVideo->setDuration($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseVideo->getDuration());
    }

    public function testEmbed(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseVideo->isEmbed());

        // ARRANGE
        $value = $this->faker->boolean;

        // ACT
        $this->releaseVideo->setEmbed($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseVideo->isEmbed());
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseVideo->getTitle());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseVideo->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseVideo->getTitle());
    }

    public function testUri(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseVideo->getUri());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->releaseVideo->setUri($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseVideo->getUri());
    }
}
