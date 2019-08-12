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
final class GetCardSearch implements EndpointInterface
{
    private const PATH = '/hearthstone/cards';

    public function __construct(string $set = , string $class = , numbers $manaCost = , numbers $attack = , numbers $health = , numbers $collectible = , string $rarity = , string $type = , string $minionType = , string $keyword = , string $textFilter = , number $page = , number $pageSize = , string $sort = , string $order = )
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
