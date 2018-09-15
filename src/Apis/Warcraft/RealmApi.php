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

namespace Boo\BattleNet\Apis\Warcraft;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class RealmApi extends AbstractApi
{
    public function getRealmIndex(string $namespace, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/realm/', [
            'namespace' => $namespace,
            'access_token' => $accessToken,
        ]);
    }

    public function getRealm(string $realmSlug, string $namespace, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/realm/'.$realmSlug, [
            'namespace' => $namespace,
            'access_token' => $accessToken,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [
            'CN',
            'SEA',
        ];
    }
}
