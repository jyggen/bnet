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

namespace Boo\BattleNet\Endpoints\WowGameData\PlayableClass;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetPvPTalentSlots implements EndpointInterface
{
    private const PATH = '/data/wow/playable-class/%1$s/pvp-talent-slots';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(integer $classId)
    {
        $this->path = vsprintf($this->path, [
            $classId,
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
