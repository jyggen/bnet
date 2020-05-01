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

    public function __construct(string $set = null, string $class = null, numbers $manaCost = null, numbers $attack = null, numbers $health = null, numbers $collectible = null, string $rarity = null, string $type = null, string $minionType = null, string $keyword = null, string $textFilter = null, number $page = null, number $pageSize = null, string $sort = null, string $order = null)
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
