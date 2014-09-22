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
