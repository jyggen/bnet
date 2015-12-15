<?php

namespace Pwnraid\Bnet\Test\Warcraft\Mount;


use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Mount\MountRequest;

class MountRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testAll()
    {
        $response = (new MountRequest(new TestClient('wow')))->all();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Mount\MountEntity', $response[0]);
        $this->assertInternalType('array', $response);

        
    }
}