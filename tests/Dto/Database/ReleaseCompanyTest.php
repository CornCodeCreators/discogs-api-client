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

use CornCodeCreators\Discogs\Dto\Database\ReleaseCompany;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseCompanyTest extends BaseTestCase
{
    private ReleaseCompany $releaseCompany;

    protected static function getClassname(): string
    {
        return ReleaseCompany::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseCompany = new ReleaseCompany();
    }

    public function testCatNo(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCompany->getCatNo());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseCompany->setCatNo($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCompany->getCatNo());
    }

    public function testEntityType(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCompany->getEntityType());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseCompany->setEntityType($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCompany->getEntityType());
    }

    public function testEntityTypeName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCompany->getEntityTypeName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseCompany->setEntityTypeName($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCompany->getEntityTypeName());
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCompany->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->releaseCompany->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCompany->getId());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCompany->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseCompany->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCompany->getName());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseCompany->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->releaseCompany->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseCompany->getResourceUrl());
    }
}
