<?php
namespace Pwnraid\Bnet\Test\Diablo;

use Mockery;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testArtisans()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest', $client->artisans());
    }

    public function testFollowers()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Followers\FollowerRequest', $client->followers());
    }

    public function testItems()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Items\ItemRequest', $client->items());
    }
}
