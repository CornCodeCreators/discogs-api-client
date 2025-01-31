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

use CornCodeCreators\Discogs\Dto\Database\Pagination;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Pagination>
 */
class PaginationFactory extends BaseFactory
{
    public static function fromArray(array $data): Pagination
    {
        $pagination = new Pagination();

        $pagination->setPage($data['page']);
        $pagination->setPages($data['pages']);
        $pagination->setPerPage($data['per_page']);
        $pagination->setItems($data['items']);
        $pagination->setUrls($data['urls']);

        return $pagination;
    }
}
