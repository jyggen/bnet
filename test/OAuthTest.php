<?php
namespace Pwnraid\Bnet\Test;

use League\OAuth2\Client\Token\AccessToken;
use Pwnraid\Bnet\OAuth;
use Pwnraid\Bnet\Region;

/**
 * @coversDefaultClass \Pwnraid\Bnet\OAuth
 */
class OAuthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::urlAuthorize
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUrlAuthorize()
    {
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.battle.net/oauth/authorize', $oauth->urlAuthorize());
    }

    /**
     * @covers ::__construct
     * @covers ::urlAccessToken
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUrlAccessToken()
    {
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.battle.net/oauth/token', $oauth->urlAccessToken());
    }

    /**
     * @covers ::__construct
     * @covers ::urlUserDetails
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUrlUserDetails()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.api.battle.net/account/user/id?access_token=foobar', $oauth->urlUserDetails($token));
    }

    /**
     * @covers ::__construct
     * @covers ::userDetails
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUserDetails()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame(['uid' => 17], $oauth->userDetails((object) ['id' => 17], $token));
    }

    /**
     * @covers ::__construct
     * @covers ::userUid
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUserUid()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame(17, $oauth->userUid((object) ['id' => 17], $token));
    }

    /**
     * @covers ::__construct
     * @covers ::userEmail
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUserEmail()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertNull($oauth->userEmail((object) [], $token));
    }

    /**
     * @covers ::__construct
     * @covers ::userScreenName
     * @uses   \Pwnraid\Bnet\Region
     */
    public function testUserScreenName()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertNull($oauth->userScreenName((object) [], $token));
    }
}
