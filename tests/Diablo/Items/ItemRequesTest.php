<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Diablo\Items;

use Pwnraid\Bnet\Diablo\Items\ItemRequest;
use Pwnraid\Bnet\Test\TestClient;

class ItemRequesTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $request = new ItemRequest(new TestClient('d3'));
        $response = $request->find('VoodooMask_206');

        $this->assertInstanceOf('\Pwnraid\Bnet\Diablo\Items\ItemEntity', $response);
        $this->assertSame('VoodooMask_206', $response->id);
    }

    public function testFindInvalidId()
    {
        $request = new ItemRequest(new TestClient('d3'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
