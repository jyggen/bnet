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
final class GuildProfileApi extends AbstractApi
{
    public function getGuildProfile(string $realm, string $guildName, array $fields = []): RequestInterface
    {
        return $this->createRequest('GET', '/wow/guild/'.$realm.'/'.$guildName, [
            'fields' => implode(',', $fields),
        ]);
    }

    public function getMembers(string $realm, string $guildName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/guild/'.$realm.'/'.$guildName, [
            'fields' => 'members',
        ]);
    }

    public function getAchievements(string $realm, string $guildName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/guild/'.$realm.'/'.$guildName, [
            'fields' => 'achievements',
        ]);
    }

    public function getNews(string $realm, string $guildName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/guild/'.$realm.'/'.$guildName, [
            'fields' => 'news',
        ]);
    }

    public function getChallenge(string $realm, string $guildName): RequestInterface
    {
        return $this->createRequest('GET', '/wow/guild/'.$realm.'/'.$guildName, [
            'fields' => 'challenge',
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
