<?php
namespace Pwnraid\Bnet;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class OAuth extends AbstractProvider
{
    protected $region;

    public function __construct(Region $region, array $options = [], array $collaborators = [])
    {
        $this->region = $region;
        parent::__construct($options);
    }

    public function getBaseAuthorizationUrl()
    {
        return $this->region->getOAuthHost().'oauth/authorize';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return $this->region->getOAuthHost().'oauth/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return $this->region->getApiHost('account').'user/id?access_token='.$token;
    }

    /**
     * Get the default scopes used by this provider.
     *
     * This should not be a complete list of all scopes, but the minimum
     * required for the provider user interface!
     *
     * @return array
     */
    protected function getDefaultScopes()
    {
        return [];
    }
    /**
     * Get the string used to separate scopes.
     *
     * @return string
     */
    protected function getScopeSeparator()
    {
        return ' ';
    }

    /**
     * Check a provider response for errors.
     *
     * @throws IdentityProviderException
     * @param  ResponseInterface $response
     * @param  string $data Parsed response data
     * @return void
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {

    }

    /**
     * Generates a resource owner object from a successful resource owner
     * details request.
     *
     * @param  array $response
     * @param  AccessToken $token
     * @return ResourceOwnerInterface
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return [
            'uid' => (int) $response['id'],
        ];
    }
}
