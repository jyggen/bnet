<?php
namespace Pwnraid\Bnet\Test;

use Pwnraid\Bnet\ClientFactory;
use Pwnraid\Bnet\Region;
use Stash\Driver\Ephemeral;
use Stash\Pool;

class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testDiablo()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Client', $factory->diablo(new Region(Region::EUROPE)));
    }

    public function testStarcraft()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Starcraft\Client', $factory->starcraft(new Region(Region::EUROPE)));
    }

    public function testWarcraft()
    {
        $pool    = new Pool(new Ephemeral);
        $factory = new ClientFactory('apikey', $pool);
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Client', $factory->warcraft(new Region(Region::EUROPE)));
    }
}
