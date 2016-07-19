<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Warcraft\Guilds;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Characters\CharacterEntity;
use Pwnraid\Bnet\Warcraft\Guilds\GuildEntity;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;

class GuildEntityTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new GuildRequest(new TestClient('wow'));
    }

    public function testThatMembersAreConvertedToEntities()
    {
        $response = $this->request->on('Auchindoun')->find('Dyslectic Defnenders', ['news', 'members']);

        $this->assertInstanceOf(GuildEntity::class, $response);
        $this->assertInstanceOf(CharacterEntity::class, $response['members'][0]['character']);
        $this->assertInternalType('string', $response['members'][0]['character']['name']);
    }
}
