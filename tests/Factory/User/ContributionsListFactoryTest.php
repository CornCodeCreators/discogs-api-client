<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Tests\Factory\User;

use CornCodeCreators\Discogs\Dto\User\ContributionsList;
use CornCodeCreators\Discogs\Factory\User\ContributionsListFactory;
use CornCodeCreators\Discogs\Tests\Factory\DtoFactoryBaseTestCase;

class ContributionsListFactoryTest extends DtoFactoryBaseTestCase
{
    protected static function getClassname(): string
    {
        return ContributionsListFactory::class;
    }

    protected static function getDtoClassname(): string
    {
        return ContributionsList::class;
    }
}
