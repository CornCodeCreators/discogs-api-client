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

use CornCodeCreators\Discogs\Dto\Database\Member;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Member>
 */
class MemberFactory extends BaseFactory
{
    public static function fromArray(array|string $data): Member
    {
        $member = new Member();

        // In case input is only a string transform it to an array
        if (is_string($data)) {
            $data = [
                'name' => trim($data),
            ];
        }

        $member->setId($data['id'] ?? null);
        $member->setName($data['name'] ?? null);
        $member->setActive($data['active'] ?? null);
        $member->setResourceUrl($data['resource_url'] ?? null);
        $member->setThumbnailUrl($data['thumbnail_url'] ?? null);

        return $member;
    }
}
