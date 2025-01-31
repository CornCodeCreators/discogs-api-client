<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\Client;

use CornCodeCreators\Discogs\Client\PersonalTokenClient;
use CornCodeCreators\Discogs\Client\Request\DatabaseRequest;
use CornCodeCreators\Discogs\Client\Request\UserIdentityRequest;
use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Enum\HttpMethod;
use CornCodeCreators\Discogs\Exception\CurlException;
use CornCodeCreators\Discogs\Exception\FileNotFoundException;
use CornCodeCreators\Discogs\Exception\FolderNotFoundException;
use CornCodeCreators\Discogs\Tests\TestTools\EnvLoader;
use PHPUnit\Framework\TestCase;

class PersonalTokenClientTest extends TestCase
{
    private string $userAgent;

    private string $userToken;

    /**
     * @throws FileNotFoundException
     * @throws FolderNotFoundException
     */
    protected function setUp(): void
    {
        EnvLoader::loadEnvironmentVariables();
        $this->userAgent = $_SERVER['DISCOGS_USER_AGENT'];
        $this->userToken = $_SERVER['DISCOGS_USER_TOKEN'];
    }

    public function testConstructorInitializesDependencies(): void
    {
        $mockPersonalTokenClient = $this->createMock(PersonalTokenClient::class);

        $this->assertInstanceOf(DatabaseRequest::class, $mockPersonalTokenClient->requestDatabase());
        $this->assertInstanceOf(UserIdentityRequest::class, $mockPersonalTokenClient->requestUser());
    }

    public function testRequestValid(): void
    {
        $method   = HttpMethod::GET;
        $endpoint = '/test-endpoint';
        $url      = 'https://api.discogs.com'.$endpoint;
        $options  = [];

        $mockResponse = $this->createMock(Response::class);

        $client = $this->getMockBuilder(PersonalTokenClient::class)
            ->onlyMethods(['curlRequest'])
            ->getMock();

        $client->expects($this->once())
            ->method('curlRequest')
            ->with(
                $this->equalTo($method),
                $this->equalTo($url),
                $this->callback(function ($options) {
                    return
                        isset($options['headers']['Authorization'])
                        && isset($options['headers']['Content-Type'])
                        && isset($options['headers']['User-Agent'])
                        && $options['headers']['User-Agent'] === $this->userAgent
                        && $options['headers']['Authorization'] === "Discogs token={$this->userToken}"
                        && $options['headers']['Content-Type'] === 'application/json';
                })
            )
            ->willReturn($mockResponse);

        $response = $client->request($method, $endpoint, $options);

        $this->assertSame($mockResponse, $response);
    }

    public function testRequestThrowsCurlException(): void
    {
        $this->expectException(CurlException::class);

        $client = $this->getMockBuilder(PersonalTokenClient::class)
            ->onlyMethods(['curlRequest'])
            ->getMock();

        $client->expects($this->once())
            ->method('curlRequest')
            ->willThrowException(new CurlException('cURL error'));

        $client->request(HttpMethod::GET, '/test-endpoint');
    }
}
