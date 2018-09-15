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

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 */
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
