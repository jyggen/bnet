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

namespace Boo\BattleNet\Endpoints\WowCommunityApis\GuildProfile;

use Boo\BattleNet\Endpoints\EndpointInterface;

final class GetGuildProfile implements EndpointInterface
{
    private const PATH = '/wow/guild/:realm/:guildName';

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getPath(): string
    {
        return self::PATH;
    }
}
