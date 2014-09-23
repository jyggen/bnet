<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Guilds\GuildRequest
 */
class GuildRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::achievements
     */
    public function testAchievements()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\AchievementEntity', $response);
        $this->assertInternalType('array', $response->achievements);
    }

    /**
     * @covers ::find
     * @covers ::on
     */
    public function testFind()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->on('Argent Dawn')->find('Blinkspeed Couriers');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Blinkspeed Couriers', $response->name);
    }

    /**
     * @covers ::find
     * @covers ::on
     */
    public function testFindWithFields()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->on('Auchindoun')->find('Dyslectic Defnenders', ['news']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Dyslectic Defnenders', $response->name);
        $this->assertInternalType('array', $response->news);
    }

    /**
     * @covers ::find
     * @covers ::on
     */
    public function testFindInvalid()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->on('Argent Dawn')->find('Invalid');

        $this->assertNull($response);
    }

    /**
     * @covers                   ::find
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     */
    public function testFindWithoutRealm()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $request->find('Blinkspeed Couriers');
    }

    /**
     * @covers ::perks
     */
    public function testPerks()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->perks();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\PerkEntity', $response);
        $this->assertInternalType('array', $response->perks);
    }

    /**
     * @covers ::rewards
     */
    public function testRewards()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->rewards();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\RewardEntity', $response);
        $this->assertInternalType('array', $response->rewards);
    }
}
