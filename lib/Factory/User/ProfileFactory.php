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

use CornCodeCreators\Discogs\Dto\User\Profile;
use CornCodeCreators\Discogs\Factory\BaseFactory;

/**
 * @extends BaseFactory<Profile>
 */
class ProfileFactory extends BaseFactory
{
    public static function fromArray(array $data): Profile
    {
        $profile = new Profile();

        $profile->setId($data['id'] ?? null);
        $profile->setResourceUrl($data['resource_url'] ?? null);
        $profile->setUri($data['uri'] ?? null);
        $profile->setUsername($data['username'] ?? null);
        $profile->setName($data['name'] ?? null);
        $profile->setHomePage($data['home_page'] ?? null);
        $profile->setLocation($data['location'] ?? null);
        $profile->setProfile($data['profile'] ?? null);
        $profile->setRegistered($data['registered'] ?? null);
        $profile->setRank($data['rank'] ?? null);
        $profile->setNumPending($data['num_pending'] ?? null);
        $profile->setNumForSale($data['num_for_sale'] ?? null);
        $profile->setNumLists($data['num_lists'] ?? null);
        $profile->setReleasesContributed($data['releases_contributed'] ?? null);
        $profile->setReleasesRated($data['releases_rated'] ?? null);
        $profile->setRatingAvg($data['rating_avg'] ?? null);
        $profile->setInventoryUrl($data['inventory_url'] ?? null);
        $profile->setCollectionFoldersUrl($data['collection_folders_url'] ?? null);
        $profile->setCollectionFieldsUrl($data['collection_fields_url'] ?? null);
        $profile->setWantlistUrl($data['wantlist_url'] ?? null);
        $profile->setAvatarUrl($data['avatar_url'] ?? null);
        $profile->setCurrAbbr($data['curr_abbr'] ?? null);
        $profile->setActivated($data['activated'] ?? null);
        $profile->setMarketplaceSuspended($data['marketplace_suspended'] ?? null);
        $profile->setBannerUrl($data['banner_url'] ?? null);
        $profile->setBuyerRating($data['buyer_rating'] ?? null);
        $profile->setBuyerRatingStars($data['buyer_rating_stars'] ?? null);
        $profile->setBuyerNumRatings($data['buyer_num_ratings'] ?? null);
        $profile->setSellerRating($data['seller_rating'] ?? null);
        $profile->setSellerRatingStars($data['seller_rating_stars'] ?? null);
        $profile->setSellerNumRatings($data['seller_num_ratings'] ?? null);
        $profile->setIsStaff($data['is_staff'] ?? null);
        $profile->setNumCollection($data['num_collection'] ?? null);
        $profile->setNumWantlist($data['num_wantlist'] ?? null);
        $profile->setEmail($data['email'] ?? null);
        $profile->setNumUnread($data['num_unread'] ?? null);

        return $profile;
    }
}
