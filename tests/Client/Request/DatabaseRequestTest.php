<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\Client\Request;

use CornCodeCreators\Discogs\Client\PersonalTokenClient;
use CornCodeCreators\Discogs\Client\Request\DatabaseRequest;
use CornCodeCreators\Discogs\Dto\Database\Artist;
use CornCodeCreators\Discogs\Dto\Database\ArtistRelease;
use CornCodeCreators\Discogs\Dto\Database\ArtistReleases;
use CornCodeCreators\Discogs\Dto\Database\Label;
use CornCodeCreators\Discogs\Dto\Database\LabelReleases;
use CornCodeCreators\Discogs\Dto\Database\MasterRelease;
use CornCodeCreators\Discogs\Dto\Database\MasterReleaseVersions;
use CornCodeCreators\Discogs\Dto\Database\Release;
use CornCodeCreators\Discogs\Dto\Database\ReleaseRatingByCommunity;
use CornCodeCreators\Discogs\Dto\Database\ReleaseRatingByUser;
use CornCodeCreators\Discogs\Dto\Database\ReleaseStats;
use CornCodeCreators\Discogs\Dto\Database\SearchResults;
use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\FileNotFoundException;
use CornCodeCreators\Discogs\Exception\FolderNotFoundException;
use CornCodeCreators\Discogs\Tests\BaseTestCase;
use CornCodeCreators\Discogs\Tests\TestTools\EnvLoader;

class DatabaseRequestTest extends BaseTestCase
{
    private PersonalTokenClient $client;

    protected static function getClassname(): string
    {
        return DatabaseRequest::class;
    }

    /**
     * @throws FileNotFoundException
     * @throws FolderNotFoundException
     */
    public function setUp(): void
    {
        parent::setUp();

        EnvLoader::loadEnvironmentVariables();
        $this->client = new PersonalTokenClient();
    }

    public function testRelease(): void
    {
        $releaseId = $this->faker->numberBetween(1000, 9999);

        try {
            $release = $this->client->requestDatabase()->getRelease($releaseId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on release id {$releaseId}");
        }

        $this->assertInstanceOf(Release::class, $release);
        $this->assertEquals($releaseId, $release->getId());
    }

    public function testReleaseRatingOfUser(): void
    {
        $releaseId           = 399193;
        $userName            = 'aayemapel';
        $releaseRatingOfUser = $this->client->requestDatabase()->getReleaseRatingOfUser($releaseId, $userName);

        $this->assertInstanceOf(ReleaseRatingByUser::class, $releaseRatingOfUser);
        $this->assertEquals($releaseId, $releaseRatingOfUser->getReleaseId());
        $this->assertEquals($userName, $releaseRatingOfUser->getUsername());
    }

    public function testAddReleaseRatingOfUser(): void
    {
        $currentUser = $this->client->requestUser()->getIdentity()->getUsername();
        $releaseId   = $this->faker->numberBetween(1000, 9999);
        $rating      = $this->faker->numberBetween(1, 5);

        try {
            $releaseRatingByUser = $this->client->requestDatabase()->addReleaseRatingOfUser($releaseId, $currentUser, $rating);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on release id {$releaseId}");
        }

        $this->assertInstanceOf(ReleaseRatingByUser::class, $releaseRatingByUser);
        $this->assertEquals($releaseId, $releaseRatingByUser->getReleaseId());
        $this->assertEquals($currentUser, $releaseRatingByUser->getUsername());
        $this->assertEquals($rating, $releaseRatingByUser->getRating());

        // REMOVE CREATED TEST FROM PROFILE
        $this->client->requestDatabase()->removeReleaseRatingOfUser($releaseId, $currentUser);
    }

    public function testRemoveReleaseRatingOfUser(): void
    {
        // CREATE RATING
        $currentUser = $this->client->requestUser()->getIdentity()->getUsername();
        $releaseId   = $this->faker->numberBetween(1000, 9999);
        $rating      = $this->faker->numberBetween(1, 5);

        $releaseRatingByUser = $this->client->requestDatabase()->addReleaseRatingOfUser($releaseId, $currentUser, $rating);
        $this->assertInstanceOf(ReleaseRatingByUser::class, $releaseRatingByUser);

        // DELETE RATING
        $this->client->requestDatabase()->removeReleaseRatingOfUser($releaseId, $currentUser);
    }

    public function testReleaseRatingOfCommunity(): void
    {
        $releaseId = $this->faker->numberBetween(1000, 9999);

        try {
            $releaseRatingOfCommunity = $this->client->requestDatabase()->getReleaseRatingOfCommunity($releaseId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on release id {$releaseId}");
        }

        $this->assertInstanceOf(ReleaseRatingByCommunity::class, $releaseRatingOfCommunity);
        $this->assertEquals($releaseId, $releaseRatingOfCommunity->getReleaseId());
    }

    public function testReleaseStats(): void
    {
        $releaseId = $this->faker->numberBetween(1000, 9999);

        try {
            $releaseStats = $this->client->requestDatabase()->getReleaseStats($releaseId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on release id {$releaseId}");
        }

        $this->assertInstanceOf(ReleaseStats::class, $releaseStats);
    }

    public function testMasterRelease(): void
    {
        $releaseId = $this->faker->numberBetween(1000, 2999);

        try {
            $masterRelease = $this->client->requestDatabase()->getMasterRelease($releaseId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on master release id {$releaseId}");
        }

        $this->assertInstanceOf(MasterRelease::class, $masterRelease);
        $this->assertEquals($releaseId, $masterRelease->getId());
    }

    public function testMasterReleaseVersions(): void
    {
        $releaseId     = $this->faker->numberBetween(1000, 1999);
        $masterRelease = $this->client->requestDatabase()->getMasterReleaseVersions($releaseId);

        $this->assertInstanceOf(MasterReleaseVersions::class, $masterRelease);
    }

    public function testArtist(): void
    {
        $artistId = $this->faker->numberBetween(10000, 99999);

        try {
            $artist = $this->client->requestDatabase()->getArtist($artistId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on artist id {$artistId}");
        }

        $this->assertInstanceOf(Artist::class, $artist);
        $this->assertEquals($artistId, $artist->getId());
    }

    public function testArtistReleases(): void
    {
        $artistId = $this->faker->numberBetween(10000, 99999);

        try {
            $artistReleases = $this->client->requestDatabase()->getArtistReleases($artistId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on artist id {$artistId}");
        }

        $this->assertInstanceOf(ArtistReleases::class, $artistReleases);
    }

    public function testLabel(): void
    {
        $labelId = $this->faker->numberBetween(100, 999);

        try {
            $label = $this->client->requestDatabase()->getLabel($labelId);
        } catch (FailedResponseException $e) {
            $this->markTestSkipped("Error '{$e->getMessage()}' on label id {$labelId}");
        }

        $this->assertInstanceOf(Label::class, $label);
        $this->assertEquals($labelId, $label->getId());
    }

    public function testLabelReleases(): void
    {
        $labelId       = $this->faker->numberBetween(100, 999);
        $labelReleases = $this->client->requestDatabase()->getLabelReleases($labelId);

        $this->assertInstanceOf(LabelReleases::class, $labelReleases);
    }

    public function testSearchAllTypes(): void
    {
        $queryParams = [
            'q'        => 'Nirvana',
            'per_page' => 5,
        ];
        $searchResults = $this->client->requestDatabase()->searchAllTypes($queryParams);

        $this->assertInstanceOf(SearchResults::class, $searchResults);
    }

    public function testSearchRelease(): void
    {
        $queryParams = [
            'q'        => 'Nirvana',
            'per_page' => 5,
        ];
        $searchResults = $this->client->requestDatabase()->searchRelease($queryParams);

        $this->assertInstanceOf(SearchResults::class, $searchResults);
        $this->assertContainsOnlyInstancesOf(Release::class, $searchResults->getResults());
    }

    public function testSearchMaster(): void
    {
        $queryParams = [
            'q'        => 'Nirvana',
            'per_page' => 5,
        ];
        $searchResults = $this->client->requestDatabase()->searchMaster($queryParams);

        $this->assertInstanceOf(SearchResults::class, $searchResults);
        $this->assertContainsOnlyInstancesOf(MasterRelease::class, $searchResults->getResults());
    }

    public function testSearchArtist(): void
    {
        $queryParams = [
            'q'        => 'Nirvana',
            'per_page' => 5,
        ];
        $searchResults = $this->client->requestDatabase()->searchArtist($queryParams);

        $this->assertInstanceOf(SearchResults::class, $searchResults);
        $this->assertContainsOnlyInstancesOf(ArtistRelease::class, $searchResults->getResults());
    }

    public function testSearchLabel(): void
    {
        $queryParams = [
            'q'        => 'Nirvana',
            'per_page' => 5,
        ];
        $searchResults = $this->client->requestDatabase()->searchLabel($queryParams);

        $this->assertInstanceOf(SearchResults::class, $searchResults);
        $this->assertContainsOnlyInstancesOf(Label::class, $searchResults->getResults());
    }
}
