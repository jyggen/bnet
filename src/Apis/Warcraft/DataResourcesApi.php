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

namespace Boo\BattleNet\Apis\Warcraft;

use Boo\BattleNet\Exceptions\UnavailableRegionException;
use Boo\BattleNet\Regions\RegionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;

final class DataResourcesApi
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

    public function __construct(RequestFactoryInterface $factory, RegionInterface $region, string $apiKey)
    {
        $this->factory = $factory;
        $this->region = $region;
        $this->queryString = [
            'apikey' => $apiKey,
            'locale' => $this->region->getLocale(),
        ];
    }

    public function getBattlegroups(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/battlegroups/';

        return $this->createRequest('GET', $url);
    }

    public function getCharacterRaces(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/character/races';

        return $this->createRequest('GET', $url);
    }

    public function getCharacterClasses(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/character/classes';

        return $this->createRequest('GET', $url);
    }

    public function getCharacterAchievements(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/character/achievements';

        return $this->createRequest('GET', $url);
    }

    public function getGuildRewards(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/guild/rewards';

        return $this->createRequest('GET', $url);
    }

    public function getGuildPerks(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/guild/perks';

        return $this->createRequest('GET', $url);
    }

    public function getGuildAchievements(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/guild/achievements';

        return $this->createRequest('GET', $url);
    }

    public function getItemClasses(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/item/classes';

        return $this->createRequest('GET', $url);
    }

    public function getTalents(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/talents';

        return $this->createRequest('GET', $url);
    }

    public function getPetTypes(): RequestInterface
    {
        if ('CN' === $this->region->getName()) {
            throw new UnavailableRegionException('CN does not support this endpoint');
        }

        if ('SEA' === $this->region->getName()) {
            throw new UnavailableRegionException('SEA does not support this endpoint');
        }

        $url = '/wow/data/pet/types';

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
