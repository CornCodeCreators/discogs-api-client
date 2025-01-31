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

use CornCodeCreators\Discogs\Dto\Database\ReleaseFormat;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ReleaseFormatTest extends BaseTestCase
{
    private ReleaseFormat $releaseFormat;

    protected static function getClassname(): string
    {
        return ReleaseFormat::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->releaseFormat = new ReleaseFormat();
    }

    public function testDescriptions(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->releaseFormat->getDescriptions());

        // ARRANGE
        $value = [
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
            $this->faker->name,
        ];

        // ACT
        $this->releaseFormat->setDescriptions($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseFormat->getDescriptions());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseFormat->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseFormat->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseFormat->getName());
    }

    public function testQty(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->releaseFormat->getQty());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->releaseFormat->setQty($value);

        // ASSERT
        $this->assertEquals($value, $this->releaseFormat->getQty());
    }
}
