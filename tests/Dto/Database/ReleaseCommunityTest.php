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

use CornCodeCreators\Discogs\Dto\Database\Contributor;
use CornCodeCreators\Discogs\Dto\Database\ReleaseCommunity;
use CornCodeCreators\Discogs\Dto\Database\ReleaseRating;
use CornCodeCreators\Discogs\Dto\Database\Submitter;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseCommunityTest extends BaseTestCase
{
    private ReleaseCommunity $releaseCommunity;

    protected static function getClassname(): string
    {
        return ReleaseCommunity::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseCommunity = new ReleaseCommunity();
    }

    public function testContributors(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->releaseCommunity->getContributors());

        // ARRANGE
        $value = [
            new Contributor(),
            new Contributor(),
            new Contributor(),
        ];

        // ACT
        $this->releaseCommunity->setContributors($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getContributors());
    }

    public function testDataQuality(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCommunity->getDataQuality());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseCommunity->setDataQuality($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getDataQuality());
    }

    public function testHave(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCommunity->getHave());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->releaseCommunity->setHave($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getHave());
    }

    public function testRating(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCommunity->getRating());

        // ARRANGE
        $value = new ReleaseRating();

        // ACT
        $this->releaseCommunity->setRating($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getRating());
    }

    public function testStatus(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCommunity->getStatus());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseCommunity->setStatus($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getStatus());
    }

    public function testSubmitter(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCommunity->getSubmitter());

        // ARRANGE
        $value = new Submitter();

        // ACT
        $this->releaseCommunity->setSubmitter($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getSubmitter());
    }

    public function testWant(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCommunity->getWant());

        // ARRANGE
        $value = $this->faker->numberBetween(10, 50);

        // ACT
        $this->releaseCommunity->setWant($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCommunity->getWant());
    }
}
