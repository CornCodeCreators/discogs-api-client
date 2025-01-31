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

use CornCodeCreators\Discogs\Dto\Database\ReleaseStats;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseStatsTest extends BaseTestCase
{
    private ReleaseStats $releaseStats;

    protected static function getClassname(): string
    {
        return ReleaseStats::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseStats = new ReleaseStats();
    }

    public function testNumHave(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseStats->getNumHave());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->releaseStats->setNumHave($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseStats->getNumHave());
    }

    public function testNumWant(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseStats->getNumWant());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->releaseStats->setNumWant($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseStats->getNumWant());
    }
}
