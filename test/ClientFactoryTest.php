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
     * @covers ::diablo
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
     */
    public function testWarcraft()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Client', $factory->warcraft(new Region(Region::EUROPE)));
    }
}
