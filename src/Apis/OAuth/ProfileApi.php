<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet\Apis\OAuth;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 */
final class ProfileApi extends AbstractApi
{
    public function getSc2OauthProfile(string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/sc2/profile/user', [
            'access_token' => $accessToken,
        ]);
    }

    public function getWowOauthProfile(string $accessToken): RequestInterface
    {
        $this->preventRegionUsage([
            'CN',
        ]);

        return $this->createRequest('GET', '/wow/user/characters', [
            'access_token' => $accessToken,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [];
    }
}
