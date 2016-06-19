<?php
namespace Pwnraid\Bnet\Tests\Warcraft\Bosses;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Bosses\BossEntity;
use Pwnraid\Bnet\Warcraft\Bosses\BossRequest;

class BossRequestTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->request = new BossRequest(new TestClient('wow'));
    }

    public function testAll()
    {
        $response = $this->request->all();

        $this->assertInstanceOf(BossEntity::class, $response[0]);
        $this->assertEquals(24723, $response[0]->id);
    }

    public function testFind()
    {
        $response = $this->request->find(24744);

        $this->assertInstanceOf(BossEntity::class, $response);
        $this->assertEquals(24744, $response->id);
    }

    public function testFindInvalidId()
    {
        $response = $this->request->find(270000);

        $this->assertNull($response);
    }
}
