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

namespace Boo\BattleNet\Tests\Apis\Warcraft;

use Boo\BattleNet\Apis\Warcraft\ZoneApi;
use Boo\BattleNet\RequestFactoryInterface;
use Boo\BattleNet\Tests\Apis\AbstractApiTestCase;
use Fig\Http\Message\RequestMethodInterface;
use Psr\Http\Message\RequestInterface;

final class ZoneApiTest extends AbstractApiTestCase
{
    public function testConstructor()
    {
        $zoneApi = new ZoneApi($this->mockFactory);

        $this->assertInstanceOf(ZoneApi::class, $zoneApi);
    }

    public function testGetMasterListAgainstMock()
    {
        $zoneApi = new ZoneApi($this->mockFactory);
        $request = $zoneApi->getMasterList();

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertSame(RequestMethodInterface::METHOD_GET, $request->getMethod());
        $this->assertSame('wow/zone/', $request->getRequestTarget());
    }

    public function testGetZoneAgainstMock()
    {
        $zoneApi = new ZoneApi($this->mockFactory);
        $request = $zoneApi->getZone(4131);

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertSame(RequestMethodInterface::METHOD_GET, $request->getMethod());
        $this->assertSame('wow/zone/4131', $request->getRequestTarget());
    }
}
