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

final class SEA implements RegionInterface
{
    /**
     * @var string[]
     */
    private static $locales = [
        RegionInterface::EN_US,
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
        return 'https://sea.api.blizzard.com';
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
        return 'SEA';
    }

    /**
     * {@inheritdoc}
     */
    public function getOAuthBaseUrl(): string
    {
        // SEA SC2 Community APIs uses the US OAuth endpoint.
        return 'https://us.battle.net';
    }
}
