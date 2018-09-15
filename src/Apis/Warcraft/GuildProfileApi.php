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
