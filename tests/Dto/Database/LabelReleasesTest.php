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

use CornCodeCreators\Discogs\Dto\Database\LabelRelease;
use CornCodeCreators\Discogs\Dto\Database\LabelReleases;
use CornCodeCreators\Discogs\Dto\Database\Pagination;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class LabelReleasesTest extends BaseTestCase
{
    private LabelReleases $labelReleases;

    protected static function getClassname(): string
    {
        return LabelReleases::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->labelReleases = new LabelReleases();
    }

    public function testPagination(): void
    {
        // ARRANGE
        $value = new Pagination();

        // ACT
        $this->labelReleases->setPagination($value);

        // ASSERT
        $this->assertEquals($value, $this->labelReleases->getPagination());
    }

    public function testReleases(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->labelReleases->getReleases());

        // ARRANGE
        $value = [
            new LabelRelease(),
            new LabelRelease(),
            new LabelRelease(),
        ];

        // ACT
        $this->labelReleases->setReleases($value);

        // ASSERT
        $this->assertEquals($value, $this->labelReleases->getReleases());
    }
}
