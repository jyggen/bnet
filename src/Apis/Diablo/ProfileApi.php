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

namespace Boo\BattleNet\Apis\Diablo;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class ProfileApi extends AbstractApi
{
    public function getApiAccount(string $account): RequestInterface
    {
        return $this->createRequest('GET', '/d3/profile/'.$account.'/');
    }

    public function getApiHero(string $account, string $heroId): RequestInterface
    {
        return $this->createRequest('GET', '/d3/profile/'.$account.'/hero/'.$heroId);
    }

    public function getApiDetailedHeroItems(string $account, string $heroId): RequestInterface
    {
        return $this->createRequest('GET', '/d3/profile/'.$account.'/hero/'.$heroId.'/items');
    }

    public function getApiDetailedFollowerItems(string $account, string $heroId): RequestInterface
    {
        return $this->createRequest('GET', '/d3/profile/'.$account.'/hero/'.$heroId.'/follower-items');
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [
            'SEA',
        ];
    }
}
