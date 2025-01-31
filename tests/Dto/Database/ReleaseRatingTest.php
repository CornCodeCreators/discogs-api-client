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

use CornCodeCreators\Discogs\Dto\Database\ReleaseRating;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseRatingTest extends BaseTestCase
{
    private ReleaseRating $releaseRating;

    protected static function getClassname(): string
    {
        return ReleaseRating::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseRating = new ReleaseRating();
    }

    public function testAverage(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRating->getAverage());

        // ARRANGE
        $value = $this->faker->randomFloat();

        // ACT
        $this->releaseRating->setAverage($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRating->getAverage());
    }

    public function testCount(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRating->getCount());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->releaseRating->setCount($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRating->getCount());
    }
}
