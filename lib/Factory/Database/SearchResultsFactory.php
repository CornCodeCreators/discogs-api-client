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

use CornCodeCreators\Discogs\Dto\Database\SearchResults;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<SearchResults>
 */
class SearchResultsFactory extends BaseFactory
{
    public static function fromArray(array $data): SearchResults
    {
        $searchResult = new SearchResults();

        $searchResult->setPagination(PaginationFactory::fromArray($data['pagination'] ?? []));
        $searchResult->setResults(array_map([SearchResultFactory::class, 'fromArray'], $data['results'] ?? []));

        return $searchResult;
    }
}
