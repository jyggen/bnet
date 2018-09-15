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

namespace Boo\BattleNet\Apis\Starcraft;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 */
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
