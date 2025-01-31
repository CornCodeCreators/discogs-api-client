<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\TestTools;

use CornCodeCreators\Discogs\Exception\FileNotFoundException;
use CornCodeCreators\Discogs\Exception\FolderNotFoundException;
use Dotenv\Dotenv;

/**
 * @see https://github.com/vlucas/phpdotenv
 */
class EnvLoader
{
    /**
     * @throws FileNotFoundException
     * @throws FolderNotFoundException
     */
    public static function loadEnvironmentVariables(): void
    {
        // FOLDER
        $envPath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..';
        $envPath = realpath($envPath);

        if (!$envPath) {
            throw new FolderNotFoundException("Folder '{$envPath}' does not exist");
        }

        // FILE
        $envFileLocal = '.env.local';
        $envUri       = $envPath.DIRECTORY_SEPARATOR.$envFileLocal;

        if (!file_exists($envUri)) {
            throw new FileNotFoundException("Environment file '{$envFileLocal}' not found in directory '{$envPath}'!");
        }

        // ENV-LOADER
        $dotenv = Dotenv::createImmutable($envPath, $envFileLocal);
        $dotenv->load();
        $dotenv->required(['DISCOGS_USER_AGENT', 'DISCOGS_USER_TOKEN']);
    }
}
