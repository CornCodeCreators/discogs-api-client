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
use CornCodeCreators\Discogs\Client\Request\UserIdentityRequest;
use CornCodeCreators\Discogs\Dto\User\ContributionsList;
use CornCodeCreators\Discogs\Dto\User\Identity;
use CornCodeCreators\Discogs\Dto\User\Profile;
use CornCodeCreators\Discogs\Dto\User\SubmissionsList;
use CornCodeCreators\Discogs\Exception\FileNotFoundException;
use CornCodeCreators\Discogs\Exception\FolderNotFoundException;
use CornCodeCreators\Discogs\Tests\BaseTestCase;
use CornCodeCreators\Discogs\Tests\TestTools\EnvLoader;

class UserIdentityRequestTest extends BaseTestCase
{
    private PersonalTokenClient $client;

    protected static function getClassname(): string
    {
        return UserIdentityRequest::class;
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

    public function testIdentity(): void
    {
        $identity = $this->client->requestUser()->getIdentity();

        $this->assertInstanceOf(Identity::class, $identity);
    }

    public function testProfile(): void
    {
        $profile = $this->client->requestUser()->getProfile($this->faker->randomElement($this->getUsers()));
        $this->assertInstanceOf(Profile::class, $profile);
    }

    public function testUpdateProfile(): void
    {
        $changeToken     = '_'.bin2hex(random_bytes(4));
        $currentUser     = $this->client->requestUser()->getIdentity();
        $originalProfile = $this->client->requestUser()->getProfile($currentUser->getUsername());

        // update single value NAME
        $updatedProfile = $this->client->requestUser()->updateProfile($currentUser->getUsername(), [
            'name' => $originalProfile->getName().$changeToken,
        ]);
        $this->assertInstanceOf(Profile::class, $updatedProfile);
        $this->assertEquals($originalProfile->getName().$changeToken, $updatedProfile->getName());

        // update single value HOME_PAGE
        $updatedProfile = $this->client->requestUser()->updateProfile($currentUser->getUsername(), [
            'home_page' => $originalProfile->getHomePage().$changeToken,
        ]);
        $this->assertInstanceOf(Profile::class, $updatedProfile);
        $this->assertEquals($originalProfile->getHomePage().$changeToken, $updatedProfile->getHomePage());

        // update single value LOCATION
        $updatedProfile = $this->client->requestUser()->updateProfile($currentUser->getUsername(), [
            'location' => $originalProfile->getLocation().$changeToken,
        ]);
        $this->assertInstanceOf(Profile::class, $updatedProfile);
        $this->assertEquals($originalProfile->getLocation().$changeToken, $updatedProfile->getLocation());

        // update single value PROFILE
        $updatedProfile = $this->client->requestUser()->updateProfile($currentUser->getUsername(), [
            'profile' => $originalProfile->getProfile().$changeToken,
        ]);
        $this->assertInstanceOf(Profile::class, $updatedProfile);
        $this->assertEquals($originalProfile->getProfile().$changeToken, $updatedProfile->getProfile());

        // update single value CURRENCY
        $updatedProfile = $this->client->requestUser()->updateProfile($currentUser->getUsername(), [
            'curr_abbr' => 'MXN',
        ]);
        $this->assertInstanceOf(Profile::class, $updatedProfile);
        $this->assertEquals('MXN', $updatedProfile->getCurrAbbr());

        // update all values (back to original)
        $updatedProfile = $this->client->requestUser()->updateProfile($currentUser->getUsername(), [
            'name'      => $originalProfile->getName(),
            'home_page' => $originalProfile->getHomePage(),
            'location'  => $originalProfile->getLocation(),
            'profile'   => $originalProfile->getProfile(),
            'curr_abbr' => $originalProfile->getCurrAbbr(),
        ]);
        $this->assertInstanceOf(Profile::class, $updatedProfile);
        $this->assertEquals($originalProfile, $updatedProfile);
    }

    public function testSubmissions(): void
    {
        $submissions = $this->client->requestUser()->getSubmissions($this->faker->randomElement($this->getUsers()));
        $this->assertInstanceOf(SubmissionsList::class, $submissions);
    }

    public function testContributions(): void
    {
        $contributions = $this->client->requestUser()->getContributions($this->faker->randomElement($this->getUsers()));
        $this->assertInstanceOf(ContributionsList::class, $contributions);
    }

    /**
     * @return string[]
     */
    private function getUsers(): array
    {
        return [
            'elisel',
            'Allard-S',
            'mayday',
            'vdq',
            'qqerwin',
            'ledjfab',
            'BeatSensor',
            'Jooles',
            'fun4themusic',
            'Kater_Murr',
            'gaga789',
            'Barry_Xwood',
            'jandlvw',
            'Vox-Records',
            'WilhelmT',
            'FastDispatch',
            'doctor_trance',
            'Techn-xs',
        ];
    }
}
