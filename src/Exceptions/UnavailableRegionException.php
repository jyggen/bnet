<?php

declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
