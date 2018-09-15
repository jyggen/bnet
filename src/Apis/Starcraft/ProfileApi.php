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

namespace Boo\BattleNet\Apis\Starcraft;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class ProfileApi extends AbstractApi
{
    public function getProfile(string $id, string $region, string $name): RequestInterface
    {
        return $this->createRequest('GET', '/sc2/profile/'.$id.'/'.$region.'/'.$name.'/');
    }

    public function getLadders(string $id, string $region, string $name): RequestInterface
    {
        return $this->createRequest('GET', '/sc2/profile/'.$id.'/'.$region.'/'.$name.'/ladders');
    }

    public function getMatchHistory(string $id, string $region, string $name): RequestInterface
    {
        return $this->createRequest('GET', '/sc2/profile/'.$id.'/'.$region.'/'.$name.'/matches');
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [];
    }
}
