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

namespace Boo\BattleNet\Regions;

final class EU implements RegionInterface
{
    /**
     * @var string[]
     */
    private static $locales = [
        RegionInterface::DE_DE,
        RegionInterface::EN_GB,
        RegionInterface::ES_ES,
        RegionInterface::FR_FR,
        RegionInterface::IT_IT,
        RegionInterface::PL_PL,
        RegionInterface::PT_PT,
        RegionInterface::RU_RU,
    ];

    /**
     * @var string
     */
    private $locale;

    /**
     * @param string $locale
     */
    public function __construct($locale = RegionInterface::EN_GB)
    {
        if (false === \in_array($locale, self::$locales, true)) {
            // @todo: Throw exception.
        }

        $this->locale = $locale;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiBaseUrl(): string
    {
        return 'https://eu.api.battle.net';
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'EU';
    }

    /**
     * {@inheritdoc}
     */
    public function getOAuthBaseUrl(): string
    {
        return 'https://eu.battle.net';
    }
}
