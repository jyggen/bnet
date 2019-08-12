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

namespace Boo\BattleNet\Endpoints\StarcraftIiGameDataApis\StarcraftIiLeague;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetLeagueData implements EndpointInterface
{
    private const PATH = '/data/sc2/league/%1$s/%2$s/%3$s/%4$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(string $seasonId, string $queueId, string $teamType, string $leagueId)
    {
        $this->path = vsprintf($this->path, [
            $seasonId,
            $queueId,
            $teamType,
            $leagueId,
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
