<?php
namespace Pwnraid\Bnet\Test;

use Mockery;
use Pwnraid\Bnet\ClientFactory;
use Pwnraid\Bnet\Region;

class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testWarcraft()
    {
        $factory = new ClientFactory('apikey', (new Mockery)->mock('Stash\Interfaces\PoolInterface')->shouldIgnoreMissing());
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Client', $factory->warcraft(Region::EUROPE));
    }
}
