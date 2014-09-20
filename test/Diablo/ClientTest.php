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
     */
    public function testBattlePets()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest', $client->artisans());
    }

    /**
     * @covers ::__construct
     * @covers ::followers
     */
    public function testCharacters()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Followers\FollowerRequest', $client->followers());
    }

    /**
     * @covers ::__construct
     * @covers ::items
     */
    public function testGuilds()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Items\ItemRequest', $client->items());
    }
}
