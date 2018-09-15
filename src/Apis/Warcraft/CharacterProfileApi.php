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
final class CharacterProfileApi extends AbstractApi
{
    public function getCharacterProfile(string $realm, string $characterName, array $fields = []): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => implode(',', $fields),
        ]);
    }

    public function getAchievements(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'achievements',
        ]);
    }

    public function getAppearance(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'appearance',
        ]);
    }

    public function getFeed(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'feed',
        ]);
    }

    public function getGuild(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'guild',
        ]);
    }

    public function getHunterPets(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'hunterPets',
        ]);
    }

    public function getItems(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'items',
        ]);
    }

    public function getMounts(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'mounts',
        ]);
    }

    public function getPets(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'pets',
        ]);
    }

    public function getPetSlots(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'petSlots',
        ]);
    }

    public function getProfessions(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'professions',
        ]);
    }

    public function getProgression(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'progression',
        ]);
    }

    public function getPVP(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'pvp',
        ]);
    }

    public function getQuests(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'quests',
        ]);
    }

    public function getReputation(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'reputation',
        ]);
    }

    public function getStatistics(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'statistics',
        ]);
    }

    public function getStats(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'stats',
        ]);
    }

    public function getTalents(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'talents',
        ]);
    }

    public function getTitles(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'titles',
        ]);
    }

    public function getAudit(string $realm, string $characterName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/character/'.$realm.'/'.$characterName, [
            'fields' => 'audit',
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
