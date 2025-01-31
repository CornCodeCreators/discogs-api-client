<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\Factory\Database;

use CornCodeCreators\Discogs\Dto\Database\Release;
use CornCodeCreators\Discogs\Factory\Database\ReleaseFactory;
use CornCodeCreators\Discogs\Tests\Factory\DtoFactoryBaseTestCase;

class ReleaseFactoryTest extends DtoFactoryBaseTestCase
{
    protected static function getClassname(): string
    {
        return ReleaseFactory::class;
    }

    protected static function getDtoClassname(): string
    {
        return Release::class;
    }
}
