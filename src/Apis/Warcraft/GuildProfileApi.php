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

use Boo\BattleNet\Regions\RegionInterface;
use Boo\BattleNet\RequestFactoryInterface;
use Fig\Http\Message\RequestMethodInterface;
use Psr\Http\Message\RequestInterface;

final class GuildProfileApi
{
    /**
     * @var string
     */
    const FIELD_MEMBERS = 'members';

    /**
     * @var string
     */
    const FIELD_ACHIEVEMENTS = 'achievements';

    /**
     * @var string
     */
    const FIELD_NEWS = 'news';

    /**
     * @var string
     */
    const FIELD_CHALLENGE = 'challenge';

    /**
     * @var RequestFactoryInterface
     */
    private $factory;

    /**
     * @param RequestFactoryInterface $factory
     */
    public function __construct(RequestFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string   $realm
     * @param string   $name
     * @param string[] $fields
     *
     * @return RequestInterface
     */
    public function getGuildProfile(string $realm, string $name, array $fields = []): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/guild/%s/%s', $realm, $name),
            $fields
        );
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getMembers(string $realm, string $name): RequestInterface
    {
        return $this->getGuildProfile($realm, $name, [self::FIELD_MEMBERS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getAchievements(string $realm, string $name): RequestInterface
    {
        return $this->getGuildProfile($realm, $name, [self::FIELD_ACHIEVEMENTS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getNews(string $realm, string $name): RequestInterface
    {
        return $this->getGuildProfile($realm, $name, [self::FIELD_NEWS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getChallenge(string $realm, string $name): RequestInterface
    {
        return $this->getGuildProfile($realm, $name, [self::FIELD_CHALLENGE]);
    }
}
