<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;

class ItemRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ItemRequest(new TestClient('wow'));
    }

    public function testClasses()
    {
        $response = $this->request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ClassEntity', $response);
        $this->assertInternalType('array', $response->classes);
    }

    public function testFind()
    {
        $response = $this->request->find(18803);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(18803, $response->id);
    }

    public function testFindInvalidId()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }

    public function testFindOnContextItem()
    {
        $response = $this->request->find(110050);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
    }

    public function testFindOnContextItemWithContext()
    {
        $request = new ItemRequest(new TestClient('wow'));
        $response = $request->withContext('dungeon-level-up-1')->find(110050);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
        $this->assertSame('dungeon-level-up-1', $response->context);
    }

    public function testFindOnContextItemWithBonusListWithContext()
    {
        $response = $this->request->withContext('dungeon-level-up-1')->find(110050, [40, 41]);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
        $this->assertSame('dungeon-level-up-1', $response->context);
        $this->assertTrue(in_array(40, $response->bonusLists, true));
        $this->assertTrue(in_array(41, $response->bonusLists, true));
    }

    public function testFindSet()
    {
        $response = $this->request->findSet(1060);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemSetEntity', $response);
        $this->assertSame(1060, $response->id);
    }

    public function testFindInvalidIdSet()
    {
        $response = $this->request->findSet('invalid');

        $this->assertNull($response);
    }
}
