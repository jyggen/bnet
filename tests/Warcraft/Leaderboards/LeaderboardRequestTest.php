<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;

class LeaderboardRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    protected function setUp()
    {
        parent::setUp();

        $this->request = $request  = new LeaderboardRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_can_get_challengeModes_for_a_single_realm()
    {
        $response = $this->request->challengeMode('Argent Dawn');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\ChallengeModeEntity', $response);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_challengeMode_provided()
    {
        $response = $this->request->challengeMode('Invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_get_challengeModes_region_wide()
    {
        $response = $this->request->challengeMode();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\ChallengeModeEntity', $response);
    }

    /**
     * @test
     */
    public function it_can_get_pvp_brackets()
    {
        $response = $this->request->pvp('2v2');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Leaderboards\BracketEntity', $response);
    }

    /**
     * @test
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Invalid bracket type
     */
    public function it_throws_exception_if_invalid_bracket_is_provided()
    {
        $this->request->pvp('invalid');
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $bracket = $this->request->asJson()->pvp('2v2');
        $challengeMode = $this->request->asJson()->challengeMode('Argent Dawn');

        $this->assertJson($bracket);
        $this->assertJson($challengeMode);
    }
}
