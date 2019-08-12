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

namespace Boo\BattleNet\Endpoints\GameDataApis\D3;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetEraLeaderboard implements EndpointInterface
{
    private const PATH = '/data/d3/era/%1$s/leaderboard/%2$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(integer $id, string $leaderboard)
    {
        $this->path = vsprintf($this->path, [
            $id,
            $leaderboard,
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
