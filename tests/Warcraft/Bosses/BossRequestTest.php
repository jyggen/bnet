<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\tests\Warcraft\Bosses;

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
