<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Diablo\Followers;

use Pwnraid\Bnet\Diablo\Followers\FollowerRequest;
use Pwnraid\Bnet\Test\TestClient;

class FollowerRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $request = new FollowerRequest(new TestClient('d3'));
        $response = $request->find('templar');

        $this->assertInstanceOf('\Pwnraid\Bnet\Diablo\Followers\FollowerEntity', $response);
        $this->assertSame('templar', $response->slug);
    }

    public function testFindInvalidId()
    {
        $request = new FollowerRequest(new TestClient('d3'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
