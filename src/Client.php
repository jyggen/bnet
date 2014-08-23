<?php
namespace Pwnraid\Bnet;

use Pwnraid\Bnet\Region;
use Pwnraid\Bnet\Warcraft\Client as WarcraftClient;
use Stash\Interfaces\PoolInterface;

class Client
{
    protected $apiKey;
    protected $cache;

    public function __construct($apiKey, PoolInterface $cache)
    {
        $this->apiKey = $apiKey;
        $this->cache  = $cache;
    }

    public function warcraft($region, $locale = null)
    {
        return new WarcraftClient($this->apiKey, new Region($region, $locale), $this->cache);
    }
}
