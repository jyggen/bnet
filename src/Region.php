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
            'locales' => ['zh_CN'],
            'hosts'   => [
                'api'   => 'https://www.battlenet.com.cn/%s/',
                'oauth' => 'https://cn.battle.net/',
            ],
        ],
        Region::EUROPE => [
            'locales' => ['en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'],
            'hosts'   => [
                'api'   => 'https://eu.api.battle.net/%s/',
                'oauth' => 'https://eu.battle.net/',
            ],
        ],
        Region::KOREA => [
            'locales' => ['ko_KR'],
            'hosts'   => [
                'api'   => 'https://kr.api.battle.net/%s/',
                'oauth' => 'https://kr.battle.net/',
            ],
        ],
        Region::TAIWAN => [
            'locales' => ['zh_TW'],
            'hosts'   => [
                'api'   => 'https://tw.api.battle.net/%s/',
                'oauth' => 'https://tw.battle.net/',
            ],
        ],
        Region::US => [
            'locales' => ['en_US', 'es_MX', 'pt_BR'],
            'hosts'   => [
                'api'   => 'https://us.api.battle.net/%s/',
                'oauth' => 'https://us.battle.net/',
            ],
        ],
    ];

    protected $host;
    protected $locale;
    protected $region;

    public function __construct($region, $locale = null)
    {
        if (isset(static::$regions[$region]) === false) {
            throw new \InvalidArgumentException($region.' is not a valid region');
        }

        $this->region = static::$regions[$region];

        if ($locale !== null && in_array($locale, $this->region['locales']) === false) {
            throw new \InvalidArgumentException($locale.' is not a valid locale');
        }

        $this->locale = ($locale === null) ? $this->region['locales'][0] : $locale;
    }

    public function getApiHost($api)
    {
        return sprintf($this->region['hosts']['api'], $api);
    }

    public function getOAuthHost()
    {
        return $this->region['hosts']['oauth'];
    }

    public function getLocale()
    {
        return $this->locale;
    }
}
