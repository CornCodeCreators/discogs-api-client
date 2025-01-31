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

use CornCodeCreators\Discogs\Dto\Database\ReleaseLabel;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseLabelTest extends BaseTestCase
{
    private ReleaseLabel $releaseLabel;

    protected static function getClassname(): string
    {
        return ReleaseLabel::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseLabel = new ReleaseLabel();
    }

    public function testCatNo(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseLabel->getCatNo());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseLabel->setCatNo($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseLabel->getCatNo());
    }

    public function testEntityType(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseLabel->getEntityType());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseLabel->setEntityType($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseLabel->getEntityType());
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseLabel->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->releaseLabel->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseLabel->getId());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseLabel->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseLabel->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseLabel->getName());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseLabel->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->releaseLabel->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseLabel->getResourceUrl());
    }
}
