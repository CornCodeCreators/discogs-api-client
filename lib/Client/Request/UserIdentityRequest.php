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
use CornCodeCreators\Discogs\Dto\User\ContributionsList;
use CornCodeCreators\Discogs\Dto\User\Identity;
use CornCodeCreators\Discogs\Dto\User\Profile;
use CornCodeCreators\Discogs\Dto\User\SubmissionsList;
use CornCodeCreators\Discogs\Enum\HttpMethod;
use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\InvalidJsonException;
use CornCodeCreators\Discogs\Factory\User\ContributionsListFactory;
use CornCodeCreators\Discogs\Factory\User\IdentityFactory;
use CornCodeCreators\Discogs\Factory\User\ProfileFactory;
use CornCodeCreators\Discogs\Factory\User\SubmissionsListFactory;

class UserIdentityRequest
{
    private const ENDPOINT_IDENTITY = '/oauth/identity';
    private const ENDPOINT_USERS    = '/users';

    public function __construct(private readonly BaseClient $client)
    {
    }

    /**
     * Retrieve basic information about the authenticated user.
     * You can use this resource to find out who you’re authenticated as, and it also doubles as a good
     * sanity check to ensure that you’re using OAuth correctly.
     * For more detailed information, make another request for the user’s Profile.
     *
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public function getIdentity(): Identity
    {
        $url      = self::ENDPOINT_IDENTITY;
        $response = $this->client->request(HttpMethod::GET, $url);
        $identity = IdentityFactory::fromResponse($response);

        return $identity;
    }

    /**
     * Retrieve a user by username.
     * If authenticated as the requested user, the email key will be visible, and the num_list count will include the user’s private lists.
     * If authenticated as the requested user or the user’s collection/wantlist is public, the num_collection / num_wantlist keys will be visible.
     *
     * @throws InvalidJsonException
     * @throws FailedResponseException
     */
    public function getProfile(string $username): Profile
    {
        $url      = self::ENDPOINT_USERS."/{$username}";
        $response = $this->client->request(HttpMethod::GET, $url);
        $profile  = ProfileFactory::fromResponse($response);

        return $profile;
    }

    /**
     * Edit a user’s profile data.
     * Authentication as the user is required.
     *
     * @param array<string, mixed> $postParams
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     *
     * @todo Create Parameter class
     */
    public function updateProfile(string $username, array $postParams = []): Profile
    {
        $options = [
            'body' => $postParams,
        ];

        $url      = self::ENDPOINT_USERS."/{$username}";
        $response = $this->client->request(HttpMethod::POST, $url, $options);
        $profile  = ProfileFactory::fromResponse($response);

        return $profile;
    }

    /**
     * The Submissions resource represents all edits that a user makes to releases, labels, and artist.
     * Retrieve a user’s submissions by username. Accepts Pagination parameters.
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     */
    public function getSubmissions(string $username): SubmissionsList
    {
        $url         = self::ENDPOINT_USERS."/{$username}/submissions";
        $response    = $this->client->request(HttpMethod::GET, $url);
        $submissions = SubmissionsListFactory::fromResponse($response);

        return $submissions;
    }

    /**
     * @param array<string, mixed> $queryParams
     *
     * @throws FailedResponseException
     * @throws InvalidJsonException
     */
    public function getContributions(string $username, array $queryParams = []): ContributionsList
    {
        $url           = self::ENDPOINT_USERS."/{$username}/contributions";
        $response      = $this->client->request(HttpMethod::GET, $url, $queryParams);
        $contributions = ContributionsListFactory::fromResponse($response);

        return $contributions;
    }
}
