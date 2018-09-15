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

namespace Boo\BattleNet\Apis\Diablo;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class OAuthApi extends AbstractApi
{
    public function getSeasonIndex(string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/data/d3/season/', [
            'access_token' => $accessToken,
        ]);
    }

    public function getSeason(int $id, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/data/d3/season/'.$id, [
            'access_token' => $accessToken,
        ]);
    }

    public function getSeasonLeaderboard(int $id, string $leaderboard, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/data/d3/season/'.$id.'/leaderboard/'.$leaderboard, [
            'access_token' => $accessToken,
        ]);
    }

    public function getEraIndex(string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/data/d3/era/', [
            'access_token' => $accessToken,
        ]);
    }

    public function getEra(int $id, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/data/d3/era/'.$id, [
            'access_token' => $accessToken,
        ]);
    }

    public function getEraLeaderboard(int $id, string $leaderboard, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/data/d3/era/'.$id.'/leaderboard/'.$leaderboard, [
            'access_token' => $accessToken,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [
            'SEA',
        ];
    }
}
