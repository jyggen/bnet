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

namespace Boo\BattleNet\Endpoints\WowGameData\Item;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetItem implements EndpointInterface
{
    private const PATH = '/data/wow/item/%1$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(string $itemId)
    {
        $this->path = vsprintf($this->path, [
            $itemId,
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
