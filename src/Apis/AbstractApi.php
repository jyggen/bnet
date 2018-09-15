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
            $queryString['apikey'] = $this->apiKey;
        }

        $queryString['locale'] = $this->region->getLocale();
        $url = sprintf('%s%s?%s', $this->region->getApiBaseUrl(), $url, http_build_query($queryString));
        $request = $this->factory->createRequest($verb, $url);
        $request = $request->withHeader('Accept', 'application/json');
        $request = $request->withHeader('Accept-Encoding', 'gzip');

        return $request;
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
