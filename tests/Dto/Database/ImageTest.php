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

use CornCodeCreators\Discogs\Dto\Database\Image;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ImageTest extends BaseTestCase
{
    private Image $image;

    protected static function getClassname(): string
    {
        return Image::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->image = new Image();
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->image->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->image->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->image->getResourceUrl());
    }

    public function testType(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->image->getType());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->image->setType($value);

        // ASSERT
        $this->assertEquals($value, $this->image->getType());
    }

    public function testUri(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->image->getUri());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->image->setUri($value);

        // ASSERT
        $this->assertEquals($value, $this->image->getUri());
    }

    public function testUri150(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->image->getUri150());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->image->setUri150($value);

        // ASSERT
        $this->assertEquals($value, $this->image->getUri150());
    }

    public function testWidth(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->image->getWidth());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->image->setWidth($value);

        // ASSERT
        $this->assertEquals($value, $this->image->getWidth());
    }

    public function testHeight(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->image->getHeight());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->image->setHeight($value);

        // ASSERT
        $this->assertEquals($value, $this->image->getHeight());
    }
}
