<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests;

use Faker\Factory as Faker;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase
{
    protected Generator $faker;

    abstract protected static function getClassname(): string;

    protected function setUp(): void
    {
        $this->faker = Faker::create();
    }

    /**
     * @return array<int, string>
     */
    public function getIgnoredMethods(): array
    {
        return [];
    }

    final public function testExpectedFunctionsAreTested(): void
    {
        $expectedTestMethods = $this->getExpectedTestMethods();
        $existingTestMethods = get_class_methods(static::class); // static::class is a reference to the CHILD-class
        $missingTestMethods  = array_diff($expectedTestMethods, $existingTestMethods);

        if ($missingTestMethods) {
            self::markTestIncomplete("Expected Methods not existing: \n - ".implode("\n - ", $missingTestMethods));
        }
    }

    /**
     * @return array<int<0, max>, string|null>
     */
    private function getExpectedTestMethods(): array
    {
        // create pattens
        $patternGetterSetter   = '/^(set|get|has|is)(\w*)$/';
        $patternAddersRemovers = '/^(add|remove|update|search)(\w*)$/';

        $expectedTestMethods = [];
        foreach ($this->getMethodsToBeTested() as $method) {
            if (preg_match($patternGetterSetter, $method)) {
                $expectedTestMethod = preg_replace($patternGetterSetter, 'test$2', (string) $method);
            } else {
                $expectedTestMethod = 'test'.ucfirst((string) $method);
            }

            $expectedTestMethods[] = $expectedTestMethod;
        }

        // remove doublets (can exist as there are GETTERS and SETTERS)
        $expectedTestMethods = array_unique($expectedTestMethods);

        return $expectedTestMethods;
    }

    /**
     * @return array<int, string>
     */
    private function getMethodsToBeTested(): array
    {
        $classname = static::getClassname();
        $this->assertTrue(class_exists($classname), "Class '$classname' does not exist.");

        $existingMethods = get_class_methods($classname);
        $ignoredMethods  = $this->getIgnoredMethods();

        // add more names to list of ignored methods
        $ignoredMethods[] = '__construct';

        $methodsToBeTested = array_diff($existingMethods, $ignoredMethods);

        return $methodsToBeTested;
    }
}
