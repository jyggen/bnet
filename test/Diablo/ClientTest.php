<?php
namespace Pwnraid\Bnet\Test\Diablo;

use Mockery;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Diablo\Client
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::artisans
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testArtisans()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest', $client->artisans());
    }

    /**
     * @covers ::__construct
     * @covers ::followers
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testFollowers()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Followers\FollowerRequest', $client->followers());
    }

    /**
     * @covers ::__construct
     * @covers ::items
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testItems()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Items\ItemRequest', $client->items());
    }
}
