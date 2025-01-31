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
use CornCodeCreators\Discogs\Dto\Database\ReleaseRatingByCommunity;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseRatingByCommunityTest extends BaseTestCase
{
    private ReleaseRatingByCommunity $releaseRatingByCommunity;

    protected static function getClassname(): string
    {
        return ReleaseRatingByCommunity::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseRatingByCommunity = new ReleaseRatingByCommunity();
    }

    public function testReleaseId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRatingByCommunity->getReleaseId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->releaseRatingByCommunity->setReleaseId($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRatingByCommunity->getReleaseId());
    }

    public function testRating(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRatingByCommunity->getRating());

        // ARRANGE
        $value = new ReleaseRating();

        // ACT
        $this->releaseRatingByCommunity->setRating($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRatingByCommunity->getRating());
    }
}
