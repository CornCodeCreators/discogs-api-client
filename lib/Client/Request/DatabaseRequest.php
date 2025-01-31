<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Client\Request;

use CornCodeCreators\Discogs\Client\BaseClient;
use CornCodeCreators\Discogs\Dto\Database\Artist;
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
use CornCodeCreators\Discogs\Enum\HttpMethod;
use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;
use CornCodeCreators\Discogs\Exception\InvalidJsonException;
use CornCodeCreators\Discogs\Exception\InvalidTypeException;
use CornCodeCreators\Discogs\Factory\Database\ArtistFactory;
use CornCodeCreators\Discogs\Factory\Database\ArtistReleasesFactory;
use CornCodeCreators\Discogs\Factory\Database\LabelFactory;
use CornCodeCreators\Discogs\Factory\Database\LabelReleasesFactory;
use CornCodeCreators\Discogs\Factory\Database\MasterReleaseFactory;
use CornCodeCreators\Discogs\Factory\Database\MasterReleaseVersionsFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseRatingOfCommunityFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseRatingOfUserFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseStatsFactory;
use CornCodeCreators\Discogs\Factory\Database\SearchResultsFactory;

class DatabaseRequest
{
    public const ENDPOINT_SEARCH  = '/database/search';
    public const ENDPOINT_RELEASE = '/releases';
    public const ENDPOINT_MASTER  = '/masters';
    public const ENDPOINT_ARTISTS = '/artists';
    public const ENDPOINT_LABELS  = '/labels';

    public function __construct(private readonly BaseClient $client)
    {
    }

    /**
     * The Release resource represents a particular physical or digital object released by one or
     * more Artists.
     *
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public function getRelease(int $releaseId, ?string $currency = null): Release
    {
        /*
        $currencies = ['USD', 'GBP', 'EUR', 'CAD', 'AUD', 'JPY', 'CHF', 'MXN', 'BRL', 'NZD', 'SEK', 'ZAR'];

        if (null !== $currency && !in_array($currency, $currencies)) {
            throw new InvalidArgumentException('Invalid currency');
        }

        $queryParams = [
            'curr_abbr' => $currency,
        ];
        */
        
        $options  = [];
        $url      = self::ENDPOINT_RELEASE."/$releaseId";
        $response = $this->client->request(HttpMethod::GET, $url, $options);
        $release  = ReleaseFactory::fromResponse($response);

        return $release;
    }

    /**
     * The Release Rating endpoint retrieves, updates, or deletes the rating of a release for a given user.
     *
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public function getReleaseRatingOfUser(int $releaseId, string $username): ReleaseRatingByUser
    {
        $url                 = self::ENDPOINT_RELEASE."/$releaseId/rating/$username";
        $response            = $this->client->request(HttpMethod::GET, $url);
        $releaseRatingOfUser = ReleaseRatingOfUserFactory::fromResponse($response);

        return $releaseRatingOfUser;
    }

    /**
     * Updates the release’s rating for a given user. Authentication as the user is required.
     *
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public function addReleaseRatingOfUser(int $releaseId, string $username, int $rating): ReleaseRatingByUser
    {
        $validRatings = range(1, 5);
        if (!in_array($rating, $validRatings)) {
            throw new FailedResponseException('Rating must be between 1 and 5');
        }

        $options = [
            'body' => [
                'rating' => $rating,
            ],
        ];

        $url                 = self::ENDPOINT_RELEASE."/$releaseId/rating/$username";
        $response            = $this->client->request(HttpMethod::PUT, $url, $options);
        $releaseRatingOfUser = ReleaseRatingOfUserFactory::fromResponse($response);

        return $releaseRatingOfUser;
    }

    /**
     * Deletes the release’s rating for a given user. Authentication as the user is required.
     *
     * @throws FailedResponseException
     * @throws InvalidArgumentException
     * @throws InvalidTypeException
     */
    public function removeReleaseRatingOfUser(int $releaseId, string $username): void
    {
        $url      = self::ENDPOINT_RELEASE."/$releaseId/rating/$username";
        $response = $this->client->request(HttpMethod::DELETE, $url);

        if ($response->getStatusCode() !== 204) {
            throw new FailedResponseException("Response {$response->getStatusCode()}");
        }
    }

    /**
     * The Community Release Rating endpoint retrieves the average rating and the total number of user ratings
     * for a given release.
     *
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public function getReleaseRatingOfCommunity(int $releaseId): ReleaseRatingByCommunity
    {
        $url                         = self::ENDPOINT_RELEASE."/$releaseId/rating";
        $response                    = $this->client->request(HttpMethod::GET, $url);
        $releaseRatingOfCommunityDto = ReleaseRatingOfCommunityFactory::fromResponse($response);

        return $releaseRatingOfCommunityDto;
    }

    /**
     * The Release Stats endpoint retrieves the total number of “haves” (in the community’s collections) and
     * “wants” (in the community’s wantlists) for a given release.
     *
     * @note The official endpoint ('/releases/{release_id}/stats') is broken, so this function is emulating
     *       the same result by using another endpoint.
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     * @throws InvalidArgumentException
     * @throws InvalidTypeException
     */
    public function getReleaseStats(int $releaseId): ReleaseStats
    {
        // This endpoint is broken (see: https://www.discogs.com/forum/thread/865093?srsltid=AfmBOoqzz5h9hyC85jmY3CsV3zoUXmZdSSbJRRCI4J8z8JFRw8TT2zrq)
        // and typically responses now with this array ['is_offensive' => false]
        $url      = self::ENDPOINT_RELEASE."/$releaseId/stats";
        $response = $this->client->request(HttpMethod::GET, $url);
        $data     = $response->getData();

        // emulate the same data result via other endpoint, if endpoint is still broken
        if (false === $data['is_offensive']) {
            $release = $this->getRelease($releaseId);

            $data = [
                'num_have' => $release->getCommunity()?->getHave(),
                'num_want' => $release->getCommunity()?->getWant(),
            ];
        }

        $releaseStatsDto = ReleaseStatsFactory::fromArray($data);

        return $releaseStatsDto;
    }

    /**
     * The Master resource represents a set of similar Releases. Masters (also known as “master releases”)
     * have a “main release” which is often the chronologically earliest.
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     */
    public function getMasterRelease(int $masterId): MasterRelease
    {
        $url      = self::ENDPOINT_MASTER."/$masterId";
        $response = $this->client->request(HttpMethod::GET, $url);
        $master   = MasterReleaseFactory::fromResponse($response);

        return $master;
    }

    /**
     * Retrieves a list of all Releases that are versions of this master. Accepts Pagination parameters.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     *
     * @todo Create ParameterClass
     */
    public function getMasterReleaseVersions(int $masterId, array $queryParams = []): MasterReleaseVersions
    {
        $url      = self::ENDPOINT_MASTER."/$masterId/versions";
        $response = $this->client->request(HttpMethod::GET, $url);

        $masterVersions = MasterReleaseVersionsFactory::fromResponse($response);

        return $masterVersions;
    }

    /**
     * Get an artist
     * The Artist resource represents a person in the Discogs database who contributed to a Release in some capacity.
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     */
    public function getArtist(int $artistId): Artist
    {
        $url      = self::ENDPOINT_ARTISTS."/$artistId";
        $response = $this->client->request(HttpMethod::GET, $url);

        $artist = ArtistFactory::fromResponse($response);

        return $artist;
    }

    /**
     * Returns a list of Releases and Masters associated with the Artist.
     * Accepts Pagination.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     *
     * @todo Create ParameterClass
     */
    public function getArtistReleases(int $artistId, array $queryParams = []): ArtistReleases
    {
        $options = [
            'query' => $queryParams,
        ];

        $url            = self::ENDPOINT_ARTISTS."/$artistId/releases";
        $response       = $this->client->request(HttpMethod::GET, $url, $options);
        $artistReleases = ArtistReleasesFactory::fromResponse($response);

        return $artistReleases;
    }

    /**
     * Get a label.
     *
     * The Label resource represents a label, company, recording studio, location, or other entity
     * involved with Artists and Releases. Labels were recently expanded in scope to include things
     * that aren’t labels – the name is an artifact of this history.
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     */
    public function getLabel(int $labelId): Label
    {
        $url      = self::ENDPOINT_LABELS."/$labelId";
        $response = $this->client->request(HttpMethod::GET, $url);

        $label = LabelFactory::fromResponse($response);

        return $label;
    }

    /**
     * Returns a list of Releases associated with the label.
     * Accepts Pagination parameters.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     *
     * @todo Create ParameterClass
     */
    public function getLabelReleases(int $labelId, array $queryParams = []): LabelReleases
    {
        $options = [
            'query' => $queryParams,
        ];

        $url           = self::ENDPOINT_LABELS."/$labelId/releases";
        $response      = $this->client->request(HttpMethod::GET, $url, $options);
        $labelReleases = LabelReleasesFactory::fromResponse($response);

        return $labelReleases;
    }

    /**
     * Issue a search query to our database. This endpoint accepts pagination parameters
     * Authentication (as any user) is required.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     **
     * @todo Create ParameterClass
     */
    public function searchAllTypes(array $queryParams = []): SearchResults
    {
        // remove potential entity type, because this is the search on all entity types
        unset($queryParams['type']);

        return $this->search($queryParams);
    }

    /**
     * Issue a search query to our database. This endpoint accepts pagination parameters
     * Authentication (as any user) is required.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws FailedResponseException
     *
     * @todo Create ParameterClass
     */
    public function searchRelease(array $queryParams = []): SearchResults
    {
        // overwrite/define entity types
        $queryParams['type'] = 'release';

        return $this->search($queryParams);
    }

    /**
     * Issue a search query to our database. This endpoint accepts pagination parameters
     * Authentication (as any user) is required.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     * @throws FailedResponseException
     *
     * @todo Create ParameterClass
     */
    public function searchMaster(array $queryParams = []): SearchResults
    {
        // overwrite/define entity types
        $queryParams['type'] = 'master';

        return $this->search($queryParams);
    }

    /**
     * Issue a search query to our database. This endpoint accepts pagination parameters
     * Authentication (as any user) is required.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     *
     * @todo Create ParameterClass
     */
    public function searchArtist(array $queryParams = []): SearchResults
    {
        // overwrite/define entity types
        $queryParams['type'] = 'artist';

        return $this->search($queryParams);
    }

    /**
     * Issue a search query to our database. This endpoint accepts pagination parameters
     * Authentication (as any user) is required.
     *
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidArgumentException
     * @throws InvalidJsonException
     *
     * @todo Create ParameterClass
     */
    public function searchLabel(array $queryParams = []): SearchResults
    {
        // overwrite/define entity types
        $queryParams['type'] = 'label';

        return $this->search($queryParams);
    }

    /**
     * @param array<string, mixed> $queryParams
     *
     * @throws InvalidArgumentException
     * @throws FailedResponseException
     * @throws InvalidJsonException
     */
    private function search(array $queryParams): SearchResults
    {
        // define expected values
        $acceptedEntityTypes = ['release', 'master', 'artist', 'label'];
        $acceptedQueryParams = [
            'q', 'type', 'title', 'release_title', 'credit', 'artist', 'anv', 'label', 'genre', 'style', 'country',
            'year', 'format', 'catno', 'barcode', 'track', 'submitter', 'contributor', 'page', 'per_page',
        ];

        // validate KEYS
        foreach ($queryParams as $key => $value) {
            if (!in_array($key, $acceptedQueryParams)) {
                throw new InvalidArgumentException("Invalid query key '$key'");
            }
        }

        // load variables
        $entityType = $queryParams['type'] ?? null;

        // validate TYPE
        if ($entityType && !in_array($entityType, $acceptedEntityTypes)) {
            throw new InvalidArgumentException("Invalid entity type '$entityType'");
        }

        // compose OPTIONS
        $options = [
            'query' => $queryParams,
        ];

        $response     = $this->client->request(HttpMethod::GET, self::ENDPOINT_SEARCH, $options);
        $searchResult = SearchResultsFactory::fromResponse($response);

        return $searchResult;
    }
}
