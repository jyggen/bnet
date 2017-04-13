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
        if (in_array($locale, $this->locales, true) === false) {
            // @todo: Throw exception.
        }

        $this->locale = $locale;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiBaseUrl(): string
    {
        return 'https://sea.api.battle.net/';
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
    public function getOAuthBaseUrl(): string
    {
        // In order to use OAuth on the SEA SC2 Community
        // APIs we need to use the US OAuth servers.
        return (new US())->getOAuthBaseUrl();
    }
}
