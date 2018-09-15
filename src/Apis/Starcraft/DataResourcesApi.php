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
final class DataResourcesApi extends AbstractApi
{
    public function getAchievements(): RequestInterface
    {
        return $this->createRequest('GET', '/sc2/data/achievements');
    }

    public function getRewards(): RequestInterface
    {
        return $this->createRequest('GET', '/sc2/data/rewards');
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [];
    }
}
