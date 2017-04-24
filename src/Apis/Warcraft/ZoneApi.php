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

namespace Boo\BattleNet\Apis\Warcraft;

use Boo\BattleNet\Regions\RegionInterface;
use Boo\BattleNet\RequestFactoryInterface;
use Fig\Http\Message\RequestMethodInterface;
use Psr\Http\Message\RequestInterface;

final class ZoneApi
{
    /**
     * @var RequestFactoryInterface
     */
    private $factory;

    /**
     * @param RequestFactoryInterface $factory
     */
    public function __construct(RequestFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return RequestInterface
     */
    public function getMasterList(): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            'wow/zone/'
        );
    }

    /**
     * @param int $zoneId
     *
     * @return RequestInterface
     */
    public function getZone(int $zoneId): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/zone/%u', $zoneId)
        );
    }
}
