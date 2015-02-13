<?php
namespace Pwnraid\Bnet\Test;

use Pwnraid\Bnet\ClientFactory;
use Pwnraid\Bnet\Region;
use Stash\Driver\Ephemeral;
use Stash\Pool;

/**
 * @coversDefaultClass \Pwnraid\Bnet\ClientFactory
 */
class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getCache
     */
    public function testGetCache()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertSame($pool, $factory->getCache());
    }

    /**
     * @covers ::__construct
     * @covers ::getCache
     */
    public function testDefaultCache()
    {
        $factory = new ClientFactory('apikey');
        $this->assertInstanceOf('Stash\Pool', $factory->getCache());
    }

    /**
     * @covers ::__construct
     * @covers ::getCache
     * @covers ::setCache
     */
    public function testSetCache()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey');
        $factory->setCache($pool);
        $this->assertSame($pool, $factory->getCache());
    }

    /**
     * @covers ::__construct
     * @covers ::diablo
     * @covers ::setCache
     * @uses   \Pwnraid\Bnet\Core\AbstractClient
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testDiablo()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Client', $factory->diablo(new Region(Region::EUROPE)));
    }

    /**
     * @covers ::__construct
     * @covers ::starcraft
     * @uses   \Pwnraid\Bnet\Core\AbstractClient
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testStarcraft()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Starcraft\Client', $factory->starcraft(new Region(Region::EUROPE)));
    }

    /**
     * @covers ::__construct
     * @covers ::warcraft
     * @uses   \Pwnraid\Bnet\Core\AbstractClient
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testWarcraft()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Client', $factory->warcraft(new Region(Region::EUROPE)));
    }
}
