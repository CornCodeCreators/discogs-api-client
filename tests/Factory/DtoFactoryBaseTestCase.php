<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\Factory;

use CornCodeCreators\Discogs\Client\Response\Response;
use CornCodeCreators\Discogs\Exception\FailedResponseException;
use CornCodeCreators\Discogs\Exception\FolderNotFoundException;
use CornCodeCreators\Discogs\Exception\InvalidArgumentException;
use CornCodeCreators\Discogs\Exception\InvalidJsonException;
use CornCodeCreators\Discogs\Factory\BaseFactory;
use CornCodeCreators\Discogs\Tests\BaseTestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Finder\Finder;

abstract class DtoFactoryBaseTestCase extends BaseTestCase
{
    abstract protected static function getDtoClassname(): string;

    /**
     * @throws FolderNotFoundException
     *
     * @return list<array<int, (string|false)>>
     */
    public static function fileProvider(): array
    {
        $dir = self::getDirectoryOfFixtures();

        $finder = new Finder();
        $finder->files()->in($dir)->files()->name('*.json');

        $files = [];
        foreach ($finder as $file) {
            $filename = $file->getRealPath();
            $json     = file_get_contents($filename);

            $files[] = [
                $json,
            ];
        }

        return $files;
    }

    #[DataProvider('fileProvider')]
    public function testFromArray(string $json): void
    {
        /** @var class-string<BaseFactory<mixed>> $factoryClass */
        $factoryClass = static::getClassname();

        /** @var class-string<mixed> $dtoClass */
        $dtoClass = static::getDtoClassname();

        $data   = json_decode($json, true);
        $object = $factoryClass::fromArray($data);

        $this->assertInstanceOf($dtoClass, $object);
    }

    /**
     * @throws InvalidJsonException
     * @throws FailedResponseException
     * @throws InvalidArgumentException
     */
    #[DataProvider('fileProvider')]
    public function testFromResponse(string $json): void
    {
        /** @var class-string<BaseFactory<mixed>> $factoryClass */
        $factoryClass = static::getClassname();

        /** @var class-string<mixed> $dtoClass */
        $dtoClass = static::getDtoClassname();

        $response = new Response(['url' => 'fake_url', 'http_code' => 200], $json);
        $object   = $factoryClass::fromResponse($response);

        $this->assertInstanceOf($dtoClass, $object);
    }

    private static function subdirectoryOfFixture(): string
    {
        $classname    = static::getDtoClassname();
        $classname    = str_replace('CornCodeCreators\\Discogs\\Dto\\', '', $classname);
        $subDirectory = str_replace('\\', DIRECTORY_SEPARATOR, $classname);

        return $subDirectory;
    }

    /**
     * @throws FolderNotFoundException
     */
    private static function getDirectoryOfFixtures(): string
    {
        $subDir = self::subdirectoryOfFixture();
        $dir    = __DIR__.DIRECTORY_SEPARATOR
            .'..'.DIRECTORY_SEPARATOR
            .'Fixtures'.DIRECTORY_SEPARATOR
            .'Dto'.DIRECTORY_SEPARATOR
            .$subDir.DIRECTORY_SEPARATOR
        ;

        $dir = realpath($dir);

        if (!$dir) {
            throw new FolderNotFoundException('Directory not found: '.$dir);
        }

        return $dir;
    }
}
