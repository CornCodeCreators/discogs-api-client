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
use CornCodeCreators\Discogs\Dto\Database\Label;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class LabelTest extends BaseTestCase
{
    private Label $label;

    protected static function getClassname(): string
    {
        return Label::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = new Label();
    }

    public function testId(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getId());

        // ARRANGE
        $value = $this->faker->numberBetween(100, 500);

        // ACT
        $this->label->setId($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getId());
    }

    public function testName(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getName());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->label->setName($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getName());
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->label->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getResourceUrl());
    }

    public function testUri(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getUri());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->label->setUri($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getUri());
    }

    public function testReleasesUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getReleasesUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->label->setReleasesUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getReleasesUrl());
    }

    public function testImages(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->label->getImages());

        // ARRANGE
        $value = [
            new Image(),
            new Image(),
            new Image(),
        ];

        // ACT
        $this->label->setImages($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getImages());
    }

    public function testContactInfo(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getContactInfo());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->label->setContactInfo($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getContactInfo());
    }

    public function testProfile(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getProfile());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->label->setProfile($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getProfile());
    }

    public function testDataQuality(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->label->getDataQuality());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->label->setDataQuality($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getDataQuality());
    }

    public function testUrls(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->label->getUrls());

        // ARRANGE
        $value = [
            $this->faker->url,
            $this->faker->url,
            $this->faker->url,
        ];

        // ACT
        $this->label->setUrls($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getUrls());
    }

    public function testSublabels(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->label->getSublabels());

        // ARRANGE
        $value = [
            new Label(),
            new Label(),
            new Label(),
            new Label(),
        ];

        // ACT
        $this->label->setSublabels($value);

        // ASSERT
        $this->assertEquals($value, $this->label->getSublabels());
    }
}
