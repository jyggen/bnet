<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;

class GuildRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testAchievements()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\AchievementEntity', $response);
        $this->assertInternalType('array', $response->achievements);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     */
    public function testFindWithoutOn()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $request->find('Blinkspeed Couriers');
    }

    public function testOn()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildRequest', $request->on('Auchindoun'));
    }

    public function testFind()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Argent Dawn');

        $response = $request->find('Blinkspeed Couriers');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Blinkspeed Couriers', $response->name);
    }

    public function testFindWithFields()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Auchindoun');

        $response = $request->find('Dyslectic Defnenders', ['news']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Dyslectic Defnenders', $response->name);
        $this->assertInternalType('array', $response->news);
    }

    public function testFindInvalid()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Argent Dawn');

        $response = $request->find('Invalid');

        $this->assertNull($response);
    }

    public function testPerks()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->perks();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\PerkEntity', $response);
        $this->assertInternalType('array', $response->perks);
    }

    public function testRewards()
    {
        $request  = new GuildRequest(new TestClient('wow'));
        $response = $request->rewards();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\RewardEntity', $response);
        $this->assertInternalType('array', $response->rewards);
    }

    /**
     * @test
     */
    public function it_returns_an_array_with_rank_and_characterEntity_objects_if_members_field_has_been_provided_on_the_fields_array()
    {
        $request = new GuildRequest(new TestClient('wow'));

        $request->on('Auchindoun');

        $response = $request->find('Dyslectic Defnenders', ['members']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response->members[0]['character']);

        $this->assertArrayHasKey('rank', $response->members[0]);
    }
}
