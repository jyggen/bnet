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

use Boo\BattleNet\Apis\Warcraft\RegionApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class RegionApiTest extends AbstractApiTest
{
    public function testGetRegionIndex(): void
    {
        $client = $this->getClient();
        $api = new RegionApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRegionIndex('dynamic-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetRegion(): void
    {
        $client = $this->getClient();
        $api = new RegionApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRegion(3, 'dynamic-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
