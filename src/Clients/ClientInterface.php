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

namespace Boo\BattleNet\Clients;

use Boo\BattleNet\Endpoints\EndpointInterface;
use Boo\BattleNet\Regions\RegionInterface;
use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    public function authorize(AccessTokenInterface $accessToken): void;
    public function call(EndpointInterface $endpoint): ResponseInterface;
    public function changeRegion(RegionInterface $region): void;
}
