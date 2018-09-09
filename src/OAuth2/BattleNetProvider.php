<?php

declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Boo\BattleNet\OAuth2;

use Boo\BattleNet\Exceptions\OAuthException;
use Boo\BattleNet\Regions\RegionInterface;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

final class BattleNetProvider extends AbstractProvider
{
    /**
     * @var RegionInterface
     */
    protected $region;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $options = [], array $collaborators = [])
    {
        parent::__construct($options, $collaborators);

        if ($this->region instanceof RegionInterface === false) {
            throw new OAuthException('Missing required option "region"');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAccessTokenUrl(array $params): string
    {
        return $this->region->getOAuthBaseUrl().'/oauth/token';
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAuthorizationUrl(): string
    {
        return $this->region->getOAuthBaseUrl().'/oauth/authorize';
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token): string
    {
        return $this->region->getApiBaseUrl().'/account/user?access_token='.$token->getToken();
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultScopes(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function checkResponse(ResponseInterface $response, $data): bool
    {
        if (array_key_exists('error', $data)) {
            throw new OAuthException($data['error'].': '.$data['error_description']);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function createResourceOwner(array $response, AccessToken $token): \stdClass
    {
        return (object) $response;
    }
}
