<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;

class GuildRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new GuildRequest(new TestClient('wow'));
    }

    public function testAchievements()
    {
        $response = $this->request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\AchievementEntity', $response);
        $this->assertInternalType('array', $response->achievements);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     */
    public function testFindWithoutOn()
    {
        $this->request->find('Blinkspeed Couriers');
    }

    public function testOn()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildRequest', $request->on('Auchindoun'));
    }

    public function testFind()
    {
        $response = $this->request->on('Argent Dawn')->find('Blinkspeed Couriers');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Blinkspeed Couriers', $response->name);
    }

    public function testFindWithFields()
    {
        $response = $this->request->on('Auchindoun')->find('Dyslectic Defnenders', ['news', 'members']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Dyslectic Defnenders', $response->name);
        $this->assertInternalType('array', $response->news);
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response->members[0]['character']);
        $this->assertArrayHasKey('rank', $response->members[0]);
    }

    public function testFindInvalid()
    {
        $response = $this->request->on('Argent Dawn')->find('Invalid');

        $this->assertNull($response);
    }

    public function testPerks()
    {
        $response = $this->request->perks();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\PerkEntity', $response);
        $this->assertInternalType('array', $response->perks);
    }

    public function testRewards()
    {
        $response = $this->request->rewards();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\RewardEntity', $response);
        $this->assertInternalType('array', $response->rewards);
    }
}
