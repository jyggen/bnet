<?php
namespace Pwnraid\Bnet\Test\Diablo\Followers;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Diablo\Followers\FollowerRequest;

class FollowerRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $request  = new FollowerRequest(new TestClient('d3'));
        $response = $request->find('templar');

        $this->assertInstanceOf('\Pwnraid\Bnet\Diablo\Followers\FollowerEntity', $response);
        $this->assertSame('templar', $response->slug);
    }

    public function testFindInvalidId()
    {
        $request  = new FollowerRequest(new TestClient('d3'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
