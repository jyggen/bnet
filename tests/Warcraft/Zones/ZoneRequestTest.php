<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\tests\Warcraft\Zones;

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
