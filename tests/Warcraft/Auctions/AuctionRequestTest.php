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
use Pwnraid\Bnet\Warcraft\Auctions\AuctionRequest;
use Pwnraid\Bnet\Warcraft\Auctions\IndexEntity;

class AuctionRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new AuctionRequest(new TestClient('wow'));
    }

    public function testIndex()
    {
        $response = $this->request->index('Auchindoun');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Auctions\IndexEntity', $response);
        $this->assertSame('http://auction-api-eu.worldofwarcraft.com/auction-data/55fa8d36ecd391f92848bef9fd085137/auctions.json', $response->url);
    }

    public function testIndexInvalidRealm()
    {
        $response = $this->request->index('Invalid');

        $this->assertNull($response);
    }

    public function testDownload()
    {
        $response = $this->request->index('Auchindoun');
        $response = $this->request->download($response);

        $this->assertInternalType('array', $response);
        $this->assertSame(1763666201, $response[0]->auc);
    }

    public function testDownloadInvalidUrl()
    {
        $response = $this->request->download(new IndexEntity(['url' => 'invalid']));

        $this->assertNull($response);
    }
}
