<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Factory\User;

use CornCodeCreators\Discogs\Dto\User\Identity;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Identity>
 */
class IdentityFactory extends BaseFactory
{
    public static function fromArray(array $data): Identity
    {
        $identity = new Identity();

        $identity->setId($data['id']);
        $identity->setUsername($data['username']);
        $identity->setResourceUrl($data['resource_url']);
        $identity->setConsumerName($data['consumer_name']);

        return $identity;
    }
}
