<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Warcraft;

use League\OAuth2\Client\Token\AccessToken;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;

class CharacterRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new CharacterRequest(new TestClient('wow'));
    }

    public function testAchievement()
    {
        $response = $this->request->achievement(2144);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementEntity', $response);
        $this->assertSame(2144, $response->id);
    }

    public function testAchievementInvalid()
    {
        $response = $this->request->achievement('invalid');

        $this->assertNull($response);
    }

    public function testAchievements()
    {
        $response = $this->request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementCategoryEntity', $response[0]);
    }

    public function testClasses()
    {
        $response = $this->request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\ClassEntity', $response[0]);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage You must set a realm name with on() before calling find()
     */
    public function testFindWithoutOn()
    {
        $this->request->find('Morloderex');
    }

    public function testOn()
    {
        $request = new CharacterRequest(new TestClient('wow'));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterRequest', $request->on('Auchindoun'));
    }

    public function testFind()
    {
        $response = $this->request->on('Argent Dawn')->find('Picaboo');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Picaboo', $response->name);
    }

    public function testFindWithFields()
    {
        $response = $this->request->on('Frostwhisper')->find('Morloderex', ['mounts', 'titles']);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response);
        $this->assertSame('Morloderex', $response->name);
        $this->assertInternalType('array', $response->mounts);
        $this->assertInternalType('array', $response->titles);
    }

    public function testFindInvalid()
    {
        $response = $this->request->on('Argent Dawn')->find('Invalid');

        $this->assertNull($response);
    }

    public function testRaces()
    {
        $response = $this->request->races();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\RaceEntity', $response[0]);
    }

    public function testTalents()
    {
        $response = $this->request->talents();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\TalentEntity', $response[1]['talents'][0]);
    }

    public function testUser()
    {
        $response = $this->request->user(new AccessToken(['access_token' => 'accesstoken']));

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\CharacterEntity', $response[0]);
        $this->assertSame('Zealotry', $response[0]->name);
    }
}
