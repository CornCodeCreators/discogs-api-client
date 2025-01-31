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

use CornCodeCreators\Discogs\Dto\Database\Submitter;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Submitter>
 */
class SubmitterFactory extends BaseFactory
{
    public static function fromArray(array $data): Submitter
    {
        $submitterDto = new Submitter();

        $submitterDto->setUsername($data['username'] ?? null);
        $submitterDto->setResourceUrl($data['resource_url'] ?? null);

        return $submitterDto;
    }
}
