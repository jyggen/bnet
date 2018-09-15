<?php

declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
