<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use League\OAuth2\Client\Token\AccessToken;
use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;

class CharacterRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new CharacterRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_can_it_a_single_achievement_by_its_id()
    {
        $response = $this->request->achievement(2144);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementEntity', $response);
        $this->assertSame(2144, $response->id);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_achievement_id_is_provided()
    {
        $response = $this->request->achievement('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_get_all_achievements()
    {
        $response = $this->request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementCategoryEntity', $response[0]);
    }

    /**
     * @test
     */
    public function it_can_get_all_classes()
    {
        $response = $this->request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\ClassEntity', $response[0]);
    }

    /**
     * @test
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     */
    public function it_throws_exception_if_find_is_used_before_on()
    {
        $this->request->find('Morloderex');
    }

    /**
     * @test
     */
    public function it_can_set_realm_name()
    {
        $request = $this->request;
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterRequest', $request->on('Auchindoun'));
        $this->assertEquals('auchindoun', $request->currentRealm());
    }

    /**
     * @test
     */
    public function it_finds_a_character()
    {
        $response = $this->request->on('Argent Dawn')
                                  ->find('Picaboo');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Picaboo', $response->name);
    }

    /**
     * @test
     */
    public function it_finds_a_character_with_additional_fields()
    {
        $response = $this->request->on('Frostwhisper')->find('Morloderex', ['mounts', 'titles']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Morloderex', $response->name);
        $this->assertInternalType('array', $response->mounts);
        $this->assertInternalType('array', $response->titles);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_character_name_is_provided()
    {
        $response = $this->request->on('Argent Dawn')
                                  ->find('Invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_get_character_races()
    {
        $response = $this->request->races();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\RaceEntity', $response[0]);
    }

    /**
     * @test
     */
    public function it_can_get_character_talents()
    {
        $response = $this->request->talents();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\TalentEntity', $response[1]['talents'][0]);
    }

    /**
     * @test
     */
    public function it_can_get_a_battle_net_users_characters()
    {
        $response = $this->request->user(new AccessToken(['access_token' => 'accesstoken']));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response[0]);
        $this->assertSame('Zealotry', $response[0]->name);
    }
}
