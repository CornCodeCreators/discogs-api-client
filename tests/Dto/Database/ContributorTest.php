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
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ContributorTest extends BaseTestCase
{
    private Contributor $contributor;

    protected static function getClassname(): string
    {
        return Contributor::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->contributor = new Contributor();
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->contributor->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->contributor->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->contributor->getResourceUrl());
    }

    public function testUsername(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->contributor->getUsername());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->contributor->setUsername($value);

        // ASSERT
        $this->assertEquals($value, $this->contributor->getUsername());
    }
}
