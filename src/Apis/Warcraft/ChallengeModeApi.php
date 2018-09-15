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

final class ChallengeModeApi extends AbstractApi
{
    public function getRealmLeaderboard(string $realm): RequestInterface
    {
        return $this->createRequest('GET', '/wow/challenge/'.$realm);
    }

    public function getRegionLeaderboard(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/challenge/region');
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
