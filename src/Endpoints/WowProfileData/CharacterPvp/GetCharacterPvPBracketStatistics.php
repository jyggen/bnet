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

namespace Boo\BattleNet\Endpoints\WowProfileData\CharacterPvp;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetCharacterPvPBracketStatistics implements EndpointInterface
{
    private const PATH = '/profile/wow/character/%1$s/%2$s/pvp-bracket/%3$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(string $realmSlug, string $characterName, string $pvpBracket)
    {
        $this->path = vsprintf($this->path, [
            $realmSlug,
            $characterName,
            $pvpBracket,
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