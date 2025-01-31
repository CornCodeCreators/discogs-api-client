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

use CornCodeCreators\Discogs\Dto\Database\ReleaseRatingByUser;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseRatingByUserTest extends BaseTestCase
{
    private ReleaseRatingByUser $releaseRatingByUser;

    protected static function getClassname(): string
    {
        return ReleaseRatingByUser::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseRatingByUser = new ReleaseRatingByUser();
    }

    public function testUsername(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRatingByUser->getUsername());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseRatingByUser->setUsername($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRatingByUser->getUsername());
    }

    public function testReleaseId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRatingByUser->getReleaseId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->releaseRatingByUser->setReleaseId($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRatingByUser->getReleaseId());
    }

    public function testRating(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseRatingByUser->getRating());

        // ARRANGE
        $value = $this->faker->numberBetween(1, 5);

        // ACT
        $this->releaseRatingByUser->setRating($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseRatingByUser->getRating());
    }
}
