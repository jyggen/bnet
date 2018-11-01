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

namespace Boo\BattleNet\Apis;

use Boo\BattleNet\Exceptions\UnavailableRegionException;
use Boo\BattleNet\Regions\RegionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;

abstract class AbstractApi
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var RequestFactoryInterface
     */
    private $factory;

    /**
     * @var RegionInterface
     */
    private $region;

    final public function __construct(RequestFactoryInterface $factory, RegionInterface $region, string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->factory = $factory;
        $this->region = $region;

        $this->preventRegionUsage($this->getRestrictedRegions());
    }

    final protected function createRequest(string $verb, string $url, array $queryString = []): RequestInterface
    {
        if (false === array_key_exists('access_token', $queryString)) {
            $queryString['access_token'] = $this->apiKey;
        }

        $queryString['locale'] = $this->region->getLocale();
        $url = sprintf('%s%s?%s', $this->region->getApiBaseUrl(), $url, http_build_query($queryString));
        $request = $this->factory->createRequest($verb, $url);
        $request = $request->withHeader('Accept', 'application/json');

        return $request->withHeader('Accept-Encoding', 'gzip');
    }

    final protected function getRegionName(): string
    {
        return $this->region->getName();
    }

    final protected function preventRegionUsage(array $regions): void
    {
        if (\in_array($this->region->getName(), $regions, true)) {
            throw UnavailableRegionException::fromRegion($this->region);
        }
    }

    /**
     * @return string[]
     */
    abstract protected function getRestrictedRegions(): array;
}
