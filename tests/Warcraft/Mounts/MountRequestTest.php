<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Warcraft\Mounts;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Mounts\MountRequest;

class MountRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testAll()
    {
        $response = (new MountRequest(new TestClient('wow')))->all();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Mounts\MountEntity', $response[0]);
    }
}
