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

final class CharacterProfileApi
{
    /**
     * @var string
     */
    const FIELD_ACHIEVEMENTS = 'achievements';

    /**
     * @var string
     */
    const FIELD_APPEARANCE = 'appearance';

    /**
     * @var string
     */
    const FIELD_FEED = 'feed';

    /**
     * @var string
     */
    const FIELD_GUILD = 'guild';

    /**
     * @var string
     */
    const FIELD_HUNTER_PETS = 'hunterPets';

    /**
     * @var string
     */
    const FIELD_ITEMS = 'items';

    /**
     * @var string
     */
    const FIELD_MOUNTS = 'mounts';

    /**
     * @var string
     */
    const FIELD_PETS = 'pets';

    /**
     * @var string
     */
    const FIELD_PET_SLOTS = 'petSlots';

    /**
     * @var string
     */
    const FIELD_PROFESSIONS = 'professions';

    /**
     * @var string
     */
    const FIELD_PROGRESSION = 'progression';

    /**
     * @var string
     */
    const FIELD_PVP = 'pvp';

    /**
     * @var string
     */
    const FIELD_QUESTS = 'quests';

    /**
     * @var string
     */
    const FIELD_REPUTATION = 'reputation';

    /**
     * @var string
     */
    const FIELD_STATISTICS = 'statistics';

    /**
     * @var string
     */
    const FIELD_STATS = 'stats';

    /**
     * @var string
     */
    const FIELD_TALENTS = 'talents';

    /**
     * @var string
     */
    const FIELD_TITLES = 'titles';

    /**
     * @var string
     */
    const FIELD_AUDIT = 'audit';

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
    public function getCharacterProfile(string $realm, string $name, array $fields = []): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/character/%s/%s', $realm, $name),
            $fields
        );
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getAchievements(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_ACHIEVEMENTS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getAppearance(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_APPEARANCE]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getFeed(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_FEED]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getGuild(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_GUILD]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getHunterPets(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_HUNTER_PETS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getItems(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_ITEMS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getMounts(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_MOUNTS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getPets(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_PETS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getPetSlots(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_PET_SLOTS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getProfessions(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_PROFESSIONS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getProgression(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_PROGRESSION]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getPvp(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_PVP]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getQuests(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_QUESTS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getReputation(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_REPUTATION]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getStatistics(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_STATISTICS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getStats(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_STATS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getTalents(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_TALENTS]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getTitles(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_TITLES]);
    }

    /**
     * @param string   $realm
     * @param string   $name
     *
     * @return RequestInterface
     */
    public function getAudit(string $realm, string $name): RequestInterface
    {
        return $this->getCharacterProfile($realm, $name, [self::FIELD_AUDIT]);
    }
}
