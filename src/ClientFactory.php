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
    protected $apiKey;
    protected $cache;

    public function __construct($apiKey, PoolInterface $cache = null)
    {
        $this->apiKey = $apiKey;

        if ($cache === null) {
            $cache = new Pool(new Ephemeral);
        }

        $this->cache = $cache;
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function setCache(PoolInterface $cache)
    {
        $this->cache = $cache;
    }

    public function diablo(Region $region)
    {
        return new DiabloClient($this->apiKey, $region, $this->cache);
    }

    public function starcraft(Region $region)
    {
        return new StarcraftClient($this->apiKey, $region, $this->cache);
    }

    public function warcraft(Region $region)
    {
        return new WarcraftClient($this->apiKey, $region, $this->cache);
    }
}
