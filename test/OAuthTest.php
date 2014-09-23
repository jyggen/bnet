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
     */
    public function testUrlAuthorize()
    {
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.battle.net/oauth/authorize', $oauth->urlAuthorize());
    }

    /**
     * @covers ::__construct
     * @covers ::urlAccessToken
     */
    public function testUrlAccessToken()
    {
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.battle.net/oauth/token', $oauth->urlAccessToken());
    }

    /**
     * @covers ::__construct
     * @covers ::urlUserDetails
     */
    public function testUrlUserDetails()
    {
        $token = new AccessToken(['access_token' => 'foobar']);
        $oauth = new OAuth(new Region(Region::EUROPE));
        $this->assertSame('https://eu.api.battle.net/account/user/id?access_token=foobar', $oauth->urlUserDetails($token));
    }
}
