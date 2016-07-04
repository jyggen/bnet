<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet;

use Psr\Cache\CacheItemPoolInterface;
use Pwnraid\Bnet\Diablo\Client as DiabloClient;
use Pwnraid\Bnet\Starcraft\Client as StarcraftClient;
use Pwnraid\Bnet\Warcraft\Client as WarcraftClient;

class ClientFactory
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var CacheItemPoolInterface
     */
    protected $cache;

    /**
     * @param string                 $apiKey
     * @param CacheItemPoolInterface $cache
     */
    public function __construct($apiKey, CacheItemPoolInterface $cache = null)
    {
        $this->apiKey = $apiKey;
        $this->cache = $cache;
    }

    /**
     * @return CacheItemPoolInterface
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param Region $region
     *
     * @return DiabloClient
     */
    public function diablo(Region $region)
    {
        return new DiabloClient($this->apiKey, $region, $this->cache);
    }

    /**
     * @param Region $region
     *
     * @return StarcraftClient
     */
    public function starcraft(Region $region)
    {
        return new StarcraftClient($this->apiKey, $region, $this->cache);
    }

    /**
     * @param Region $region
     *
     * @return WarcraftClient
     */
    public function warcraft(Region $region)
    {
        return new WarcraftClient($this->apiKey, $region, $this->cache);
    }
}
