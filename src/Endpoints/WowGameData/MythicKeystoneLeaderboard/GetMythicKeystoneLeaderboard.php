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

namespace Boo\BattleNet\Endpoints\WowGameData\MythicKeystoneLeaderboard;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetMythicKeystoneLeaderboard implements EndpointInterface
{
    private const PATH = '/data/wow/connected-realm/%1$s/mythic-leaderboard/%2$s/period/%3$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(integer $connectedRealmId, integer $dungeonId, integer $period)
    {
        $this->path = vsprintf($this->path, [
            $connectedRealmId,
            $dungeonId,
            $period,
        ]);
    }

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
