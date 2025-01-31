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

use CornCodeCreators\Discogs\Dto\Database\ReleaseCompany;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<ReleaseCompany>
 */
class ReleaseCompanyFactory extends BaseFactory
{
    public static function fromArray(array $data): ReleaseCompany
    {
        $company = new ReleaseCompany();
        $company->setCatNo($data['catno'] ?? null);
        $company->setEntityType($data['entity_type'] ?? null);
        $company->setEntityTypeName($data['entity_type_name'] ?? null);
        $company->setId($data['id'] ?? null);
        $company->setName($data['name'] ?? null);
        $company->setResourceUrl($data['resource_url'] ?? null);

        return $company;
    }
}
