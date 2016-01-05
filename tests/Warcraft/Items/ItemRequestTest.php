<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;

class ItemRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testClasses()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ClassEntity', $response);
        $this->assertInternalType('array', $response->classes);
    }

    public function testFind()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->find(18803);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(18803, $response->id);
    }

    public function testFindInvalidId()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }

    public function testFindOnContextItem()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->find(110050);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
    }

    public function testFindOnContextItemWithContext()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->withContext('dungeon-level-up-1')->find(110050);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
        $this->assertSame('dungeon-level-up-1', $response->context);
    }

    public function testFindOnContextItemWithBonusListWithContext()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->withContext('dungeon-level-up-1')->find(110050, [40, 41]);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
        $this->assertSame('dungeon-level-up-1', $response->context);
        $this->assertTrue(in_array(40, $response->bonusLists));
        $this->assertTrue(in_array(41, $response->bonusLists));
    }

    public function testFindSet()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->findSet(1060);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemSetEntity', $response);
        $this->assertSame(1060, $response->id);
    }

    public function testFindInvalidIdSet()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->findSet('invalid');

        $this->assertNull($response);
    }
}
