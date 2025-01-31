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

use CornCodeCreators\Discogs\Dto\User\SubmissionsList;
use CornCodeCreators\Discogs\Factory\BaseFactory;
use CornCodeCreators\Discogs\Factory\Database\PaginationFactory;

/**
 * @extends BaseFactory<SubmissionsList>
 */
class SubmissionsListFactory extends BaseFactory
{
    public static function fromArray(array $data): SubmissionsList
    {
        $submissions = new SubmissionsList();

        $submissions->setPagination(PaginationFactory::fromArray($data['pagination'] ?? []));
        $submissions->setSubmissions(SubmissionsFactory::fromArray($data['submissions'] ?? []));

        return $submissions;
    }
}
