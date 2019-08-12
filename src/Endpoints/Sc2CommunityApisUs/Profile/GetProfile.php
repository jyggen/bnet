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

namespace Boo\BattleNet\Endpoints\Sc2CommunityApisUs\Profile;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetProfile implements EndpointInterface
{
    private const PATH = '/sc2/profile/%1$s/%2$s/%3$s';

    /**
     * @var string
     */
    private $path = self::PATH;

    public function __construct(integer $regionId, integer $realmId, integer $profileId)
    {
        $this->path = vsprintf($this->path, [
            $regionId,
            $realmId,
            $profileId,
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
