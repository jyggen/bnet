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

use Boo\BattleNet\Regions\RegionInterface;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

abstract class BattleNetProvider extends AbstractProvider
{
    /**
     * @var RegionInterface
     */
    private $region;

    /**
     * {@inheritdoc}
     */
    public function getBaseAuthorizationUrl(): string
    {
        return sprintf(
            '%s/oauth/authorize',
            rtrim($this->region->getOAuthBaseUrl(), '/')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAccessTokenUrl(array $params): string
    {
        return sprintf(
            '%s/oauth/token',
            rtrim($this->region->getOAuthBaseUrl(), '/')
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {

    }
}
