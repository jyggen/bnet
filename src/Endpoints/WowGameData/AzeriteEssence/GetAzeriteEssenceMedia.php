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

namespace Boo\BattleNet\Endpoints\WowGameData\AzeriteEssence;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetAzeriteEssenceMedia implements EndpointInterface
{
    private const PATH = '/data/wow/media/azerite-essence/%1$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(integer $azeriteEssenceId)
    {
        $this->path = vsprintf($this->path, [
            $azeriteEssenceId,
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
