<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;

class RealmRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new RealmRequest(new TestClient('wow'));
    }

    public function testAll()
    {
        $response = $this->request->all();

        $this->assertInternalType('array', $response);
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
    }

    public function testFindSingle()
    {
        $response = $this->request->find('Argent Dawn');
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response);
        $this->assertSame('Argent Dawn', $response->name);
    }

    public function testFindSingleInvalid()
    {
        $response = $this->request->find('Invalid');

        $this->assertNull($response);
    }

    public function testFindNotSingle()
    {
        $response = $this->request->find(['Argent Dawn']);

        $this->assertInternalType('array', $response);
        $this->assertSame(1, count($response));
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
        $this->assertSame('Argent Dawn', $response[0]->name);
    }

    public function testFindMultiple()
    {
        $response = $this->request->find(['Argent Dawn', 'Auchindoun']);

        $this->assertInternalType('array', $response);
        $this->assertSame(2, count($response));
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Unable to fetch all requested realms
     */
    public function testFindMultipleInvalid()
    {
        $this->request->find(['Frostwhispers', 'Auchindsoun']);
    }

    public function testBattlegroups()
    {
        $response = $this->request->battlegroups();
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\BattlegroupEntity', $response[0]);
        $this->assertEquals('sturmangriff-charge', $response[6]->slug);
    }
}
