<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;

class GuildRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();
        $this->request = new GuildRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_gets_achievements()
    {
        $response = $this->request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\AchievementEntity', $response);
        $this->assertInternalType('array', $response->achievements);
    }

    /**
     * @test
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     */
    public function it_throws_exception_if_find_is_called_before_on()
    {
        $this->request->find('Blinkspeed Couriers');
    }

    /**
     * @test
     */
    public function when_on_is_called_it_sets_realm_correctly()
    {
        $request = $this->request;
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildRequest', $request->on('Auchindoun'));
        $this->assertEquals('auchindoun', $request->getCurrentRealm());
    }

    /**
     * @test
     */
    public function it_finds_a_guild_for_the_given_realm()
    {
        $response = $this->request->on('Argent Dawn')->find('Blinkspeed Couriers');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Blinkspeed Couriers', $response->name);
    }

    /**
     * @test
     */
    public function when_finding_a_guild_you_can_provide_additional_fields()
    {
        $response = $this->request->on('Auchindoun')
                         ->find('Dyslectic Defnenders', [
                            'news',
                            'members'
                         ]);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\GuildEntity', $response);
        $this->assertSame('Dyslectic Defnenders', $response->name);
        $this->assertInternalType('array', $response->news);
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response->members[0]['character']);
        $this->assertArrayHasKey('rank', $response->members[0]);
    }

    /**
     * @test
     */
    public function it_returns_null_when_invalid_guild_is_provided()
    {
        $response = $this->request->on('Argent Dawn')->find('Invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_get_all_perks_which_a_guild_can_have()
    {
        $response = $this->request->perks();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\PerkEntity', $response);
        $this->assertInternalType('array', $response->perks);
    }

    /**
     * @test
     */
    public function it_can_get_all_rewards_a_guild_can_have()
    {
        $response = $this->request->rewards();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Guilds\RewardEntity', $response);
        $this->assertInternalType('array', $response->rewards);
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $perks = $this->request->asJson()->perks();
        $rewards = $this->request->asJson()->rewards();
        $guildWithFields = $this->request->asJson()->on('Auchindoun')
            ->find('Dyslectic Defnenders', [
                'news',
                'members'
            ]);
        $guildWithOutFields = $this->request->asJson()->on('Argent Dawn')
            ->find('Blinkspeed Couriers');
        $this->assertJson($guildWithFields);
        $this->assertJson($rewards);
        $this->assertJson($perks);
        $this->assertJson($guildWithOutFields);
    }
}
