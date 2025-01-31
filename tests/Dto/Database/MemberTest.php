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

use CornCodeCreators\Discogs\Dto\Database\Member;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class MemberTest extends BaseTestCase
{
    private Member $member;

    protected static function getClassname(): string
    {
        return Member::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->member = new Member();
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->member->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->member->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->member->getId());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->member->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->member->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->member->getName());
    }

    public function testActive(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->member->isActive());

        // ARRANGE
        $value = $this->faker->boolean;

        // ACT
        $this->member->setActive($value);

        // ASSERT
        $this->assertEquals($value, $this->member->isActive());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->member->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->member->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->member->getResourceUrl());
    }

    public function testThumbnailUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->member->getThumbnailUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->member->setThumbnailUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->member->getThumbnailUrl());
    }
}
