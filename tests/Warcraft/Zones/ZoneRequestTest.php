<?php
namespace Pwnraid\Bnet\Tests\Warcraft\Zones;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Zones\ZoneEntity;
use Pwnraid\Bnet\Warcraft\Zones\ZoneRequest;

class ZoneRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ZoneRequest(new TestClient('wow'));
    }

    public function testAll()
    {
        $response = $this->request->all();

        $this->assertInstanceOf(ZoneEntity::class, $response[0]);
    }

    public function testFind()
    {
        $response = $this->request->find(4131);

        $this->assertInstanceOf(ZoneEntity::class, $response);
        $this->assertEquals('Magister\'s Terrace', $response->name);
    }

    public function testFindInvalidId()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }
}
