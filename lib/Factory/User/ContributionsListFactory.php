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

use CornCodeCreators\Discogs\Dto\User\ContributionsList;
use CornCodeCreators\Discogs\Factory\BaseFactory;
use CornCodeCreators\Discogs\Factory\Database\PaginationFactory;
use CornCodeCreators\Discogs\Factory\Database\ReleaseFactory;

/**
 * @extends BaseFactory<ContributionsList>
 */
class ContributionsListFactory extends BaseFactory
{
    public static function fromArray(array $data): ContributionsList
    {
        $contributionsList = new ContributionsList();

        $contributionsList->setPagination(PaginationFactory::fromArray($data['pagination'] ?? []));
        $contributionsList->setContributions(array_map([ReleaseFactory::class, 'fromArray'], $data['contributions'] ?? []));

        return $contributionsList;
    }
}
