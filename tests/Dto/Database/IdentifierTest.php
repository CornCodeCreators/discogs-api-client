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

use CornCodeCreators\Discogs\Dto\Database\Identifier;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class IdentifierTest extends BaseTestCase
{
    private Identifier $identifier;

    protected static function getClassname(): string
    {
        return Identifier::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->identifier = new Identifier();
    }

    public function testType(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->identifier->getType());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->identifier->setType($value);

        // ASSERT
        $this->assertEquals($value, $this->identifier->getType());
    }

    public function testValue(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertNull($this->identifier->getValue());

        // ARRANGE
        $value = $this->faker->name;

        // ACT
        $this->identifier->setValue($value);

        // ASSERT
        $this->assertEquals($value, $this->identifier->getValue());
    }
}
