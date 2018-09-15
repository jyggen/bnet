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
