<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet\Apis\Warcraft;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class ConnectedRealmApi extends AbstractApi
{
    public function getConnectedRealmIndex(string $namespace, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/connected-realm/', [
            'namespace' => $namespace,
            'access_token' => $accessToken,
        ]);
    }

    public function getConnectedRealm(int $connectedRealmId, string $namespace, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/connected-realm/'.$connectedRealmId, [
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
