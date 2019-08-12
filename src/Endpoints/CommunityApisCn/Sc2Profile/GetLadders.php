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

namespace Boo\BattleNet\Endpoints\CommunityApisCn\Sc2Profile;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetLadders implements EndpointInterface
{
    private const PATH = '/sc2/profile/%1$s/%2$s/%3$s/ladders';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(string $id, string $region, string $name)
    {
        $this->path = vsprintf($this->path, [
            $id,
            $region,
            $name,
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
