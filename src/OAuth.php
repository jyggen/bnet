<?php
namespace Pwnraid\Bnet;

use League\OAuth2\Client\Provider\IdentityProvider;
use League\OAuth2\Client\Token\AccessToken;

class OAuth extends IdentityProvider
{
    public $scopeSeparator = ' ';
    public $scopes = ['wow.profile', 'sc2.profile'];

    protected $region;

    public function __construct(Region $region, $options = array())
    {
        $this->region = $region;
        parent::__contruct($options);
    }

    public function urlAuthorize()
    {
        return $this->region->getOAuthHost().'oauth/authorize';
    }

    public function urlAccessToken()
    {
        return $this->region->getOAuthHost().'oauth/token';
    }

    public function urlUserDetails(AccessToken $token)
    {
        return $this->region->getApiHost().'account/user/id?access_token='.$token;
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
