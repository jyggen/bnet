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
