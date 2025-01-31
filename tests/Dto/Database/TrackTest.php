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

use CornCodeCreators\Discogs\Dto\Database\Track;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class TrackTest extends BaseTestCase
{
    private Track $track;

    protected static function getClassname(): string
    {
        return Track::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->track = new Track();
    }

    public function testDuration(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->track->getDuration());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->track->setDuration($value);

        // ASSERT
        $this->assertEquals($value, $this->track->getDuration());
    }

    public function testPosition(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->track->getPosition());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->track->setPosition($value);

        // ASSERT
        $this->assertEquals($value, $this->track->getPosition());
    }

    public function testTitle(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->track->getTitle());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->track->setTitle($value);

        // ASSERT
        $this->assertEquals($value, $this->track->getTitle());
    }

    public function testType(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->track->getType());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->track->setType($value);

        // ASSERT
        $this->assertEquals($value, $this->track->getType());
    }
}
