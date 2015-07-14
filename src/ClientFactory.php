<?php
namespace Pwnraid\Bnet;

use Pwnraid\Bnet\Diablo\Client as DiabloClient;
use Pwnraid\Bnet\Starcraft\Client as StarcraftClient;
use Pwnraid\Bnet\Warcraft\Client as WarcraftClient;
use Stash\Driver\Ephemeral;
use Stash\Interfaces\PoolInterface;
use Stash\Pool;

class ClientFactory
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var PoolInterface
     */
    protected $cache;

    /**
     * @param string        $apiKey
     * @param PoolInterface $cache
     */
    public function __construct($apiKey, PoolInterface $cache = null)
    {
        $this->apiKey = $apiKey;

        if ($cache === null) {
            $cache = new Pool(new Ephemeral);
        }

        $this->cache = $cache;
    }

    /**
     * @return PoolInterface
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param PoolInterface $cache
     *
     * @return void
     */
    public function setCache(PoolInterface $cache)
    {
        $this->cache = $cache;
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
