<?php
namespace Pwnraid\Bnet;

use Pwnraid\Bnet\Diablo\Client as DiabloClient;
use Pwnraid\Bnet\Starcraft\Client as StarcraftClient;
use Pwnraid\Bnet\Warcraft\Client as WarcraftClient;
use Stash\Interfaces\PoolInterface;

class ClientFactory
{
    protected $apiKey;
    protected $cache;

    public function __construct($apiKey, PoolInterface $cache = null)
    {
        $this->apiKey = $apiKey;
        $this->cache  = $cache;
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
