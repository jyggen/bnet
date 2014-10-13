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
     */
    public function testDownload()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->download(new IndexEntity(['url' => 'foobar']));

        $this->assertInternalType('array', $response);
        $this->assertTrue(array_key_exists('alliance', $response));
        $this->assertTrue(array_key_exists('horde', $response));
        $this->assertTrue(array_key_exists('neutral', $response));
        $this->assertSame(955294802, $response['alliance'][0]->auc);
        $this->assertSame(956415210, $response['horde'][0]->auc);
        $this->assertSame(956037492, $response['neutral'][0]->auc);
    }

    /**
     * @covers ::index
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
     */
    public function testIndexInvalidRealm()
    {
        $request  = new AuctionRequest(new TestClient('wow'));
        $response = $request->index('Invalid');

        $this->assertNull($response);
    }
}
