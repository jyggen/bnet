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

namespace Boo\BattleNet\Exceptions;

use Boo\BattleNet\Regions\RegionInterface;
use Exception;

final class UnavailableRegionException extends Exception
{
    public static function fromRegion(RegionInterface $region)
    {
        return new self($region->getName().' does not support this endpoint');
    }
}
