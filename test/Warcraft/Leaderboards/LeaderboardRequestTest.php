<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;

class LeaderboardRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testChallengeMode()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->challengeMode('Argent Dawn');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\ChallengeModeEntity', $response);
    }

    public function testChallengeModeInvalid()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->challengeMode('Invalid');

        $this->assertNull($response);
    }

    public function testChallengeModeRegion()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->challengeMode();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\ChallengeModeEntity', $response);
    }

    public function testPvp()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $response = $request->pvp('2v2');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\BracketEntity', $response);
    }

    /**
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Invalid bracket type
     */
    public function testPvpInvalidBracket()
    {
        $request  = new LeaderboardRequest(new TestClient('wow'));
        $request->pvp('invalid');
    }
}
