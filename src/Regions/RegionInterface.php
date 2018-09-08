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

interface RegionInterface
{
    /**
     * German (Latin, Germany).
     */
    const DE_DE = 'de_DE';

    /**
     * English (Latin, United Kingdom).
     */
    const EN_GB = 'en_GB';

    /**
     * English (Latin, United States).
     */
    const EN_US = 'en_US';

    /**
     * Spanish (Latin, Spain).
     */
    const ES_ES = 'es_ES';

    /**
     * Spanish (Latin, Mexico).
     */
    const ES_MX = 'es_MX';

    /**
     * French (Latin, France).
     */
    const FR_FR = 'fr_FR';

    /**
     * Italian (Latin, Italy).
     */
    const IT_IT = 'it_IT';

    /**
     * Korean (Korean, South Korea).
     */
    const KO_KR = 'ko_KR';

    /**
     * Polish (Latin, Poland).
     */
    const PL_PL = 'pl_PL';

    /**
     * Portuguese (Latin, Brazil).
     */
    const PT_BR = 'pt_BR';

    /**
     * Portuguese (Latin, Portugal).
     */
    const PT_PT = 'pt_PT';

    /**
     * Russian (Cyrillic, Russia).
     */
    const RU_RU = 'ru_RU';

    /**
     * Chinese (Simplified, China).
     */
    const ZH_CN = 'zh_CN';

    /**
     * Gets the base URL for the Community APIs.
     */
    public function getApiBaseUrl(): string;

    /**
     * Gets the selected locale.
     */
    public function getLocale(): string;

    /**
     * Gets the name of the region.
     */
    public function getName(): string;

    /**
     * Gets the base URL for the OAuth endpoints.
     */
    public function getOAuthBaseUrl(): string;
}
