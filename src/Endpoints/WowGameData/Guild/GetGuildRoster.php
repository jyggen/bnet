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

namespace Boo\BattleNet\Endpoints\WowGameData\Guild;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetGuildRoster implements EndpointInterface
{
    private const PATH = '/data/wow/guild/%1$s/%2$s/roster';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(string $realmSlug, string $nameSlug)
    {
        $this->path = vsprintf($this->path, [
            $realmSlug,
            $nameSlug,
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
