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

use CornCodeCreators\Discogs\Dto\Database\ArtistRelease;
use CornCodeCreators\Discogs\Dto\Database\ArtistReleases;
use CornCodeCreators\Discogs\Dto\Database\Pagination;
use CornCodeCreators\Discogs\Tests\BaseTestCase;

class ArtistReleasesTest extends BaseTestCase
{
    private ArtistReleases $artistReleases;

    protected static function getClassname(): string
    {
        return ArtistReleases::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->artistReleases = new ArtistReleases();
    }

    public function testPagination(): void
    {
        // ARRANGE
        $value = new Pagination();

        // ACT
        $this->artistReleases->setPagination($value);

        // ASSERT
        $this->assertEquals($value, $this->artistReleases->getPagination());
    }

    public function testReleases(): void
    {
        // ASSERT INITIAL VALUE
        $this->assertEmpty($this->artistReleases->getReleases());

        // ARRANGE
        $value = [
            new ArtistRelease(),
            new ArtistRelease(),
            new ArtistRelease(),
        ];

        // ACT
        $this->artistReleases->setReleases($value);

        // ASSERT
        $this->assertEquals($value, $this->artistReleases->getReleases());
    }
}
