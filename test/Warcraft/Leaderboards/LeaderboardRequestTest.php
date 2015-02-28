<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest
 */
class LeaderboardRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::challengeMode
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testChallengeMode()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->challengeMode('Argent Dawn');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\ChallengeModeEntity', $response);
    }

    /**
     * @covers ::challengeMode
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     * @uses   \Pwnraid\Bnet\Utils
     */
    public function testChallengeModeInvalid()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->challengeMode('Invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::challengeMode
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testChallengeModeRegion()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->challengeMode();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\ChallengeModeEntity', $response);
    }

    /**
     * @covers ::pvp
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testPvp()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->pvp('2v2');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\BracketEntity', $response);
    }

    /**
     * @covers                   ::pvp
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Invalid bracket type
     * @uses                     \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testPvpInvalidBracket()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $request->pvp('invalid');
    }
}
