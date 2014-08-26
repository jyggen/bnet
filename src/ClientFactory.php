<?php
namespace Pwnraid\Bnet;

use Pwnraid\Bnet\Region;
use Pwnraid\Bnet\Diablo\Client as DiabloClient;
use Pwnraid\Bnet\Starcraft\Client as StarcraftClient;
use Pwnraid\Bnet\Warcraft\Client as WarcraftClient;
use Stash\Interfaces\PoolInterface;

class ClientFactory
{
    protected $apiKey;
    protected $cache;

    public function __construct($apiKey, PoolInterface $cache)
    {
        $this->apiKey = $apiKey;
        $this->cache  = $cache;
    }

    public function diablo($region, $locale = null)
    {
        return new DiabloClient($this->apiKey, new Region($region, $locale), $this->cache);
    }

    public function starcraft($region, $locale = null)
    {
        return new StarcraftClient($this->apiKey, new Region($region, $locale), $this->cache);
    }

    public function warcraft($region, $locale = null)
    {
        return new WarcraftClient($this->apiKey, new Region($region, $locale), $this->cache);
    }
}
