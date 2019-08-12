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

namespace Boo\BattleNet\Endpoints\GameDataApis\Cards;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetDetailedCardSearchExample implements EndpointInterface
{
    private const PATH = '/hearthstone/cards';

    public function __construct(string $set = rise-of-shadows, string $class = mage, numbers $manaCost = 10, numbers $attack = 4, numbers $health = 10, numbers $collectible = 1, string $rarity = legendary, string $type = minion, string $minionType = dragon, string $keyword = battlecry, string $textFilter = kalecgos, number $page = 1, number $pageSize = 5, string $sort = name, string $order = desc)
    {
    }

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getPath(): string
    {
        return self::PATH;
    }
}
