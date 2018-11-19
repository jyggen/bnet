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

namespace Boo\BattleNet\Regions;

final class US implements RegionInterface
{
    /**
     * @var string[]
     */
    private static $locales = [
        RegionInterface::EN_US,
        RegionInterface::ES_MX,
        RegionInterface::PT_BR,
    ];

    /**
     * @var string
     */
    private $locale;

    /**
     * @param string $locale
     */
    public function __construct($locale = RegionInterface::EN_US)
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
        return 'https://us.api.blizzard.com';
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
        return 'US';
    }

    /**
     * {@inheritdoc}
     */
    public function getOAuthBaseUrl(): string
    {
        return 'https://us.battle.net';
    }
}
