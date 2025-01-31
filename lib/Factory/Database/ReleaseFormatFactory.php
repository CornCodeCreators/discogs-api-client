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

use CornCodeCreators\Discogs\Dto\Database\ReleaseFormat;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseFormat>
 */
class ReleaseFormatFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseFormat
    {
        $format = new ReleaseFormat();

        $format->setDescriptions($data['descriptions'] ?? []);
        $format->setName($data['name'] ?? null);
        $format->setQty($data['qty'] ?? null);

        return $format;
    }
}
