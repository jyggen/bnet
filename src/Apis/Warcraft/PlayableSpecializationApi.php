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

final class PlayableSpecializationApi extends AbstractApi
{
    public function getPlayableSpecializationIndex(string $namespace, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/playable-specialization/', [
            'namespace' => $namespace,
            'access_token' => $accessToken,
        ]);
    }

    public function getPlayableSpecialization(int $specId, string $namespace, string $accessToken): RequestInterface
    {
        return $this->createRequest('GET', '/playable-specialization/'.$specId, [
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
