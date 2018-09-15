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

final class DataResourcesApi extends AbstractApi
{
    public function getBattlegroups(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/battlegroups/');
    }

    public function getCharacterRaces(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/character/races');
    }

    public function getCharacterClasses(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/character/classes');
    }

    public function getCharacterAchievements(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/character/achievements');
    }

    public function getGuildRewards(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/guild/rewards');
    }

    public function getGuildPerks(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/guild/perks');
    }

    public function getGuildAchievements(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/guild/achievements');
    }

    public function getItemClasses(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/item/classes');
    }

    public function getTalents(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/talents');
    }

    public function getPetTypes(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/data/pet/types');
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
