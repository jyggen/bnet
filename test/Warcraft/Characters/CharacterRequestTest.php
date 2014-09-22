<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Characters\CharacterRequest
 */
class CharacterRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::achievements
     */
    public function testAchievements()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->achievements();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\AchievementEntity', $response);
        $this->assertInternalType('array', $response->achievements);
    }

    /**
     * @covers ::classes
     */
    public function testClasses()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\ClassEntity', $response);
        $this->assertInternalType('array', $response->classes);
    }

    /**
     * @covers ::races
     */
    public function testRaces()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->races();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\RaceEntity', $response);
        $this->assertInternalType('array', $response->races);
    }

    /**
     * @covers ::talents
     */
    public function testTalents()
    {
        $request  = new CharacterRequest(new TestClient('wow'));
        $response = $request->talents();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Characters\TalentEntity', $response);
        $this->assertInternalType('array', $response->{1}['glyphs']);
    }
}
