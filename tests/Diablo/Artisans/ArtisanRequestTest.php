<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Diablo\Artisans;

use Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest;
use Pwnraid\Bnet\Test\TestClient;

class ArtisanRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $request = new ArtisanRequest(new TestClient('d3'));
        $response = $request->find('mystic');

        $this->assertInstanceOf('\Pwnraid\Bnet\Diablo\Artisans\ArtisanEntity', $response);
        $this->assertSame('mystic', $response->slug);
    }

    public function testFindInvalidId()
    {
        $request = new ArtisanRequest(new TestClient('d3'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
