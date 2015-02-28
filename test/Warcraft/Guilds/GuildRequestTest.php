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
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testAchievements()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\AchievementEntity', $response);
        $this->assertInternalType('array', $response->achievements);
    }

    /**
     * @covers                   ::find
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     * @uses                     \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testFindWithoutOn()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $request->find('Blinkspeed Couriers');
    }

    /**
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testOn()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildRequest', $request->on('Auchindoun'));
    }

    /**
     * @covers ::find
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testFind()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Argent Dawn');

        $response = $request->find('Blinkspeed Couriers');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Blinkspeed Couriers', $response->name);
    }

    /**
     * @covers ::find
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testFindWithFields()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Auchindoun');

        $response = $request->find('Dyslectic Defnenders', ['news']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Dyslectic Defnenders', $response->name);
        $this->assertInternalType('array', $response->news);
    }

    /**
     * @covers ::find
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testFindInvalid()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Argent Dawn');

        $response = $request->find('Invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::perks
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
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
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testRewards()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->rewards();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\RewardEntity', $response);
        $this->assertInternalType('array', $response->rewards);
    }
}
