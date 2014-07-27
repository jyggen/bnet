<?php
namespace Pwnraid\Bnet\Warcraft;

use Pwnraid\Bnet\BaseClient;
use Pwnraid\Bnet\Warcraft\Request\Quest;

class Client extends BaseClient
{
    public static $locales = [
        'US' => ['en_US', 'es_MX', 'pt_BR'],
        'EU' => ['en_GB', 'es_ES', 'fr_FR', 'ru_RU', 'de_DE', 'pt_PT', 'it_IT'],
        'KR' => ['ko_KR'],
        'TW' => ['zh_TW'],
        'CH' => ['zh_CN'],
    ];

    public static $regions = [
        'US' => 'https://us.battle.net/api/wow/',
        'EU' => 'https://eu.battle.net/api/wow/',
        'KR' => 'https://kr.battle.net/api/wow/',
        'TW' => 'https://tw.battle.net/api/wow/',
        'CH' => 'https://www.battlenet.com.cn/api/wow/',
    ];

    public function quests()
    {
        return new Quest($this);
    }
}
