<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Auctions\AuctionRequest;
use Pwnraid\Bnet\Warcraft\Auctions\IndexEntity;

class AuctionRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testIndex()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Auchindoun');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Auctions\IndexEntity', $response);
        $this->assertSame('http://eu.battle.net/auction-data/55fa8d36ecd391f92848bef9fd085137/auctions.json', $response->url);
    }

    public function testIndexInvalidRealm()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Invalid');

        $this->assertNull($response);
    }

    public function testDownload()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Auchindoun');
        $response = $request->download($response);

        $this->assertInternalType('array', $response);
        $this->assertSame(1298519171, $response[0]->auc);
    }

    public function testDownloadInvalidUrl()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->download(new IndexEntity(['url' => 'invalid']));

        $this->assertNull($response);
    }
}
