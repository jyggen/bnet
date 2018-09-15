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
