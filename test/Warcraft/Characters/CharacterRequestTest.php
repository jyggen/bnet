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
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
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
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testAchievementInvalid()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->achievement('invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::achievements
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Warcraft\Characters\AchievementCategoryEntity
     */
    public function testAchievements()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementCategoryEntity', $response[0]);
    }

    /**
     * @covers ::classes
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testClasses()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\ClassEntity', $response[0]);
    }

    /**
     * @covers                   ::find
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     * @uses                     \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testFindWithoutOn()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $request->find('Jyggen');
    }

    /**
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testOn()
    {
        $request = new CharacterRequest(new TestClient('wow'));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterRequest', $request->on('Auchindoun'));
    }

    /**
     * @covers ::find
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     * @uses   \Pwnraid\Bnet\Warcraft\Characters\CharacterEntity
     */
    public function testFind()
    {
        $request = new CharacterRequest(new TestClient('wow'));

        $request->on('Argent Dawn');

        $response = $request->find('Picaboo');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Picaboo', $response->name);
    }

    /**
     * @covers ::find
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     * @uses   \Pwnraid\Bnet\Warcraft\Characters\CharacterEntity
     */
    public function testFindWithFields()
    {
        $request  = new CharacterRequest(new TestClient('wow'));

        $request->on('Auchindoun');

        $response = $request->find('Jyggen', ['mounts', 'titles']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Jyggen', $response->name);
        $this->assertInternalType('array', $response->mounts);
        $this->assertInternalType('array', $response->titles);
    }

    /**
     * @covers ::find
     * @covers ::on
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testFindInvalid()
    {
        $request  = new CharacterRequest(new TestClient('wow'));

        $request->on('Argent Dawn');

        $response = $request->find('Invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::races
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testRaces()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->races();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\RaceEntity', $response[0]);
    }

    /**
     * @covers ::talents
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testTalents()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->talents();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\TalentEntity', $response[1]['talents'][0]);
    }

    /**
     * @covers ::user
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     * @uses   \Pwnraid\Bnet\Warcraft\Characters\CharacterEntity
     */
    public function testUser()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->user(new AccessToken(['access_token' => 'accesstoken']));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response[0]);
        $this->assertSame('Zealotry', $response[0]->name);
    }
}
