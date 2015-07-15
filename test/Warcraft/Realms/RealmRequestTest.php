<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;

class RealmRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testAll()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->all();

        $this->assertInternalType('array', $response);
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
    }

    public function testFindSingle()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->find('Argent Dawn');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response);
        $this->assertSame('Argent Dawn', $response->name);
    }

    public function testFindSingleInvalid()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->find('Invalid');

        $this->assertNull($response);
    }

    public function testFindNotSingle()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->find(['Argent Dawn']);

        $this->assertInternalType('array', $response);
        $this->assertSame(1, count($response));
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
        $this->assertSame('Argent Dawn', $response[0]->name);
    }

    public function testFindMultiple()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->find(['Argent Dawn', 'Auchindoun']);

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
        $request  = new RealmRequest(new TestClient('wow'));
        $request->find(['Argant Dewn', 'Auchindoun']);
    }

    public function testBattlegroups()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->battlegroups();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\BattlegroupEntity', $response);
        $this->assertInternalType('array', $response->battlegroups);
    }
}
