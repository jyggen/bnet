<?php

namespace Pwnraid\Bnet\Test\Warcraft\Mounts;


use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Mounts\MountRequest;

class MountRequestTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_all_mounts() {

        $response = (new MountRequest(new TestClient('wow')))->all();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Mounts\MountEntity', $response[0]);
    }
}