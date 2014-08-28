<?php
namespace Pwnraid\Bnet;

use League\OAuth2\Client\Provider\IdentityProvider;
use League\OAuth2\Client\Provider\User;
use League\OAuth2\Client\Token\AccessToken;

class Oauth extends IdentityProvider
{
    public $region         = '';
    public $scopeSeparator = ' ';

    public $scopes = ['wow.profile', 'sc2.profile'];

    public function urlAuthorize()
    {
        return 'https://'.$this->region.'.battle.net/oauth/authorize';
    }

    public function urlAccessToken()
    {
        return 'https://'.$this->region.'.battle.net/oauth/token';
    }

    public function urlUserDetails(AccessToken $token)
    {
    }

    public function userDetails($response, AccessToken $token)
    {
    }

    public function userUid($response, AccessToken $token)
    {
    }

    public function userEmail($response, AccessToken $token)
    {
    }

    public function userScreenName($response, AccessToken $token)
    {
    }
}
