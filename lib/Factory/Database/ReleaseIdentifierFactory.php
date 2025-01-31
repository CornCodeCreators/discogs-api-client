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

use CornCodeCreators\Discogs\Dto\Database\Identifier;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Identifier>
 */
class ReleaseIdentifierFactory extends BaseFactory
{
    public static function fromArray(array $data): Identifier
    {
        $identifier = new Identifier();
        $identifier->setType($data['type'] ?? null);
        $identifier->setValue($data['value'] ?? null);

        return $identifier;
    }
}
