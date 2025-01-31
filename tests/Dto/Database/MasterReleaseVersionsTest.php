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

use CornCodeCreators\Discogs\Dto\Database\FilterFacet;
use CornCodeCreators\Discogs\Dto\Database\Filters;
use CornCodeCreators\Discogs\Dto\Database\MasterReleaseVersions;
use CornCodeCreators\Discogs\Dto\Database\Pagination;
use CornCodeCreators\Discogs\Dto\Database\Versions;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class MasterReleaseVersionsTest extends BaseTestCase
{
    private MasterReleaseVersions $masterReleaseVersions;

    protected static function getClassname(): string
    {
        return MasterReleaseVersions::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->masterReleaseVersions = new MasterReleaseVersions();
    }

    public function testPagination(): void
    {
        // ARRANGE
        $value = new Pagination();

        // ACT
        $this->masterReleaseVersions->setPagination($value);

        // ASSERT
        $this->assertEquals($value, $this->masterReleaseVersions->getPagination());
    }

    public function testFilters(): void
    {
        // ARRANGE
        $value = new Filters();

        // ACT
        $this->masterReleaseVersions->setFilters($value);

        // ASSERT
        $this->assertEquals($value, $this->masterReleaseVersions->getFilters());
    }

    public function testFilterFacets(): void
    {
        // ARRANGE
        $value = [
            new FilterFacet(),
            new FilterFacet(),
            new FilterFacet(),
            new FilterFacet(),
        ];

        // ACT
        $this->masterReleaseVersions->setFilterFacets($value);

        // ASSERT
        $this->assertEquals($value, $this->masterReleaseVersions->getFilterFacets());
    }

    public function testVersions(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->masterReleaseVersions->getVersions());

        // ARRANGE
        $value = [
            new Versions(),
            new Versions(),
            new Versions(),
        ];

        // ACT
        $this->masterReleaseVersions->setVersions($value);

        // ASSERT
        $this->assertEquals($value, $this->masterReleaseVersions->getVersions());
    }
}
