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

namespace Boo\BattleNet\Endpoints;

use Fig\Http\Message\RequestMethodInterface;

interface EndpointInterface extends RequestMethodInterface
{
    public function getMethod(): string;
    public function getPath(): string;
}
