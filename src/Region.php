<?php
namespace Pwnraid\Bnet;

class Region
{
    const CHINA  = 'cn';
    const EUROPE = 'eu';
    const KOREA  = 'kr';
    const TAIWAN = 'tw';
    const US     = 'us';

    protected static $regions = [
        Region::CHINA => [
            'host'    => 'https://www.battlenet.com.cn/%s/',
            'locales' => ['zh_CN'],
        ],
        Region::EUROPE => [
            'host'    => 'https://eu.api.battle.net/%s/',
            'locales' => ['en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'],
        ],
        Region::KOREA => [
            'host'    => 'https://kr.api.battle.net/%s/',
            'locales' => ['ko_KR'],
        ],
        Region::TAIWAN => [
            'host'    => 'https://tw.api.battle.net/%s/',
            'locales' => ['zh_TW'],
        ],
        Region::US => [
            'host'    => 'https://us.api.battle.net/%s/',
            'locales' => ['en_US', 'es_MX', 'pt_BR'],
        ],
    ];

    protected $host;
    protected $locale;
    protected $region;

    public function __construct($region, $locale = null)
    {
        if (isset(static::$regions[$region]) === false) {
            throw new \OutOfBoundsException($region.' is not a valid region.');
        }

        $this->region = static::$regions[$region];

        if ($locale !== null and in_array($locale, $this->region['locales']) === false) {
            throw new \OutOfBoundsException($locale.' is not a valid locale.');
        }

        $this->locale = ($locale === null) ? $this->region['locales'][0] : $locale;
    }

    public function getHost($api)
    {
        return sprintf($this->region['host'], $api);
    }

    public function getLocale()
    {
        return $this->locale;
    }
}
