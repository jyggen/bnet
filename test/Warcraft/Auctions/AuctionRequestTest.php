<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Auctions\AuctionRequest;
use Pwnraid\Bnet\Warcraft\Auctions\IndexEntity;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Auctions\AuctionRequest
 */
class AuctionRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::download
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testDownload()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->download(new IndexEntity(['url' => 'auctions']));

        $this->assertInternalType('array', $response);
        $this->assertSame(955294802, $response[0]->auc);
    }

    /**
     * @covers ::download
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testDownloadInvalidUrl()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->download(new IndexEntity(['url' => 'invalid']));

        $this->assertNull($response);
    }

    /**
     * @covers ::index
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utility
     */
    public function testIndex()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Auchindoun');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Auctions\IndexEntity', $response);
        $this->assertSame('http://eu.battle.net/auction-data/55fa8d36ecd391f92848bef9fd085137/auctions.json', $response->url);
    }

    /**
     * @covers ::index
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utility
     */
    public function testIndexInvalidRealm()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Invalid');

        $this->assertNull($response);
    }
}
