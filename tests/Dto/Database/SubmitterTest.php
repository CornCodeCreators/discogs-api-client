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

use CornCodeCreators\Discogs\Dto\Database\Submitter;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class SubmitterTest extends BaseTestCase
{
    private Submitter $submitter;

    protected static function getClassname(): string
    {
        return Submitter::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->submitter = new Submitter();
    }

    public function testResourceUrl(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->submitter->getResourceUrl());

        // ARRANGE
        $value = $this->faker->url;

        // ACT
        $this->submitter->setResourceUrl($value);

        // ASSERT
        $this->assertEquals($value, $this->submitter->getResourceUrl());
    }

    public function testUsername(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->submitter->getUsername());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->submitter->setUsername($value);

        // ASSERT
        $this->assertEquals($value, $this->submitter->getUsername());
    }
}
