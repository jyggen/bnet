<?php
namespace Pwnraid\Bnet;

class Region
{
    /**
     * @var string
     */
    const CHINA = 'cn';

    /**
     * @var string
     */
    const EUROPE = 'eu';

    /**
     * @var string
     */
    const KOREA = 'kr';

    /**
     * @var string
     */
    const TAIWAN = 'tw';

    /**
     * @var string
     */
    const US = 'us';

    /**
     * @var array
     */
    protected static $regions = [
        self::CHINA => [
            'locales' => ['zh_CN'],
            'hosts'   => [
                'api'   => 'https://www.battlenet.com.cn/%s/',
                'oauth' => 'https://cn.battle.net/',
            ],
        ],
        self::EUROPE => [
            'locales' => ['en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'],
            'hosts'   => [
                'api'   => 'https://eu.api.battle.net/%s/',
                'oauth' => 'https://eu.battle.net/',
            ],
        ],
        self::KOREA => [
            'locales' => ['ko_KR'],
            'hosts'   => [
                'api'   => 'https://kr.api.battle.net/%s/',
                'oauth' => 'https://kr.battle.net/',
            ],
        ],
        self::TAIWAN => [
            'locales' => ['zh_TW'],
            'hosts'   => [
                'api'   => 'https://tw.api.battle.net/%s/',
                'oauth' => 'https://tw.battle.net/',
            ],
        ],
        self::US => [
            'locales' => ['en_US', 'es_MX', 'pt_BR'],
            'hosts'   => [
                'api'   => 'https://us.api.battle.net/%s/',
                'oauth' => 'https://us.battle.net/',
            ],
        ],
    ];

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var array
     */
    protected $region;

    /**
     * @return array
     */
    public static function all()
    {
        return static::$regions;
    }

    /**
     * @param string $region
     * @param string $locale
     */
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

    /**
     * @param string $api
     *
     * @return string
     */
    public function getApiHost($api)
    {
        return sprintf($this->region['hosts']['api'], $api);
    }

    /**
     * @return string
     */
    public function getOAuthHost()
    {
        return $this->region['hosts']['oauth'];
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
