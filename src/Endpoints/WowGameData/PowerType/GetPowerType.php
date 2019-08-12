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

namespace Boo\BattleNet\Endpoints\WowGameData\PowerType;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetPowerType implements EndpointInterface
{
    private const PATH = '/data/wow/power-type/%1$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(integer $powerTypeId)
    {
        $this->path = vsprintf($this->path, [
            $powerTypeId,
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
