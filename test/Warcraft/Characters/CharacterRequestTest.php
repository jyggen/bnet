<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use League\OAuth2\Client\Token\AccessToken;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Characters\CharacterRequest
 */
class CharacterRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::achievement
     */
    public function testAchievement()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->achievement(2144);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementEntity', $response);
        $this->assertSame(2144, $response->id);
    }

    /**
     * @covers ::achievement
     */
    public function testAchievementInvalid()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->achievement('invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::achievements
     */
    public function testAchievements()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementCategoryEntity', $response[0]);
    }

    /**
     * @covers ::classes
     */
    public function testClasses()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\ClassEntity', $response[0]);
    }

    /**
     * @covers ::find
     * @covers ::on
     */
    public function testFind()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->on('Argent Dawn')->find('Picaboo');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Picaboo', $response->name);
    }

    /**
     * @covers ::find
     * @covers ::on
     */
    public function testFindWithFields()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->on('Auchindoun')->find('Jyggen', ['mounts', 'titles']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Jyggen', $response->name);
        $this->assertInternalType('array', $response->mounts);
        $this->assertInternalType('array', $response->titles);
    }

    /**
     * @covers ::find
     * @covers ::on
     */
    public function testFindInvalid()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
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
        $request  = new CharacterRequest(new TestClient('wow'));
        $request->find('Jyggen');
    }

    /**
     * @covers ::races
     */
    public function testRaces()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->races();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\RaceEntity', $response[0]);
    }

    /**
     * @covers ::talents
     */
    public function testTalents()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->talents();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\TalentEntity', $response[1]['talents'][0]);
    }

    /**
     * @covers ::user
     */
    public function testUser()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->user(new AccessToken(['access_token' => 'accesstoken']));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response[0]);
        $this->assertSame('Zealotry', $response[0]->name);
    }
}
