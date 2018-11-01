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

final class KR implements RegionInterface
{
    /**
     * @var string[]
     */
    private static $locales = [
        RegionInterface::KO_KR,
    ];

    /**
     * @var string
     */
    private $locale;

    /**
     * @param string $locale
     */
    public function __construct($locale = RegionInterface::KO_KR)
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
        return 'https://kr.api.blizzard.com';
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
        return 'KR';
    }

    /**
     * {@inheritdoc}
     */
    public function getOAuthBaseUrl(): string
    {
        return 'https://kr.battle.net';
    }
}
