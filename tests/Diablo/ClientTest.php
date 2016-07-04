<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Diablo;

use Mockery;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testArtisans()
    {
        $client = (new Mockery())->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest', $client->artisans());
    }

    public function testFollowers()
    {
        $client = (new Mockery())->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Followers\FollowerRequest', $client->followers());
    }

    public function testItems()
    {
        $client = (new Mockery())->mock('Pwnraid\Bnet\Diablo\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Diablo\Items\ItemRequest', $client->items());
    }
}
