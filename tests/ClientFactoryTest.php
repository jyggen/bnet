<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test;

use Fig\Cache\Memory\MemoryPool;
use Pwnraid\Bnet\ClientFactory;
use Pwnraid\Bnet\Region;

class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCache()
    {
        $pool = new MemoryPool();
        $factory = new ClientFactory('apikey', $pool);
        $this->assertSame($pool, $factory->getCache());
    }

    public function testGetCacheWithoutCache()
    {
        $factory = new ClientFactory('apikey');
        $this->assertSame(null, $factory->getCache());
    }

    public function testDiablo()
    {
        $pool = new MemoryPool();
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Client', $factory->diablo(new Region(Region::EUROPE)));
    }

    public function testStarcraft()
    {
        $pool = new MemoryPool();
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Starcraft\Client', $factory->starcraft(new Region(Region::EUROPE)));
    }

    public function testWarcraft()
    {
        $pool = new MemoryPool();
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Client', $factory->warcraft(new Region(Region::EUROPE)));
    }
}
