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

use Boo\BattleNet\Exceptions\UnavailableRegionException;
use Boo\BattleNet\Regions\RegionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;

final class OAuthApi
{
    /**
     * @var RequestFactoryInterface
     */
    private $factory;

    /**
     * @var array<string, int|string>
     */
    private $queryString;

    /**
     * @var RegionInterface
     */
    private $region;

    public function __construct(RequestFactoryInterface $factory, RegionInterface $region, string $accessToken)
    {
        $this->factory = $factory;
        $this->region = $region;
        $this->queryString = [
            'access_token' => $accessToken,
            'locale' => $this->region->getLocale(),
        ];
    }

    public function getSeasonIndex(): RequestInterface
    {
        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/data/d3/season/';

        return $this->createRequest('GET', $url);
    }

    public function getSeason(int $id): RequestInterface
    {
        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/data/d3/season/'.$id;

        return $this->createRequest('GET', $url);
    }

    public function getSeasonLeaderboard(int $id, string $leaderboard): RequestInterface
    {
        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/data/d3/season/'.$id.'/leaderboard/'.$leaderboard;

        return $this->createRequest('GET', $url);
    }

    public function getEraIndex(): RequestInterface
    {
        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/data/d3/era/';

        return $this->createRequest('GET', $url);
    }

    public function getEra(int $id): RequestInterface
    {
        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/data/d3/era/'.$id;

        return $this->createRequest('GET', $url);
    }

    public function getEraLeaderboard(int $id, string $leaderboard): RequestInterface
    {
        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/data/d3/era/'.$id.'/leaderboard/'.$leaderboard;

        return $this->createRequest('GET', $url);
    }

    private function createRequest(string $verb, string $url, array $queryString = []): RequestInterface
    {
        $url = $url.'?'.http_build_query(array_replace($this->queryString, $queryString));
        $url = $this->region->getApiBaseUrl().$url;
        $request = $this->factory->createRequest($verb, $url);
        $request = $request->withHeader('Accept', 'application/json');
        $request = $request->withHeader('Accept-Encoding', 'gzip');

        return $request;
    }
}
