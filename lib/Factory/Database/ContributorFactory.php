<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Factory\Database;

use CornCodeCreators\Discogs\Dto\Database\Contributor;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Contributor>
 */
class ContributorFactory extends BaseFactory
{
    public static function fromArray(array $data): Contributor
    {
        $contributorDto = new Contributor();

        $contributorDto->setUsername($data['username'] ?? null);
        $contributorDto->setResourceUrl($data['resource_url'] ?? null);

        return $contributorDto;
    }
}
