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

use Boo\BattleNet\Apis\Warcraft\RealmApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class RealmApiTest extends AbstractApiTest
{
    public function testGetRealmIndex(): void
    {
        $client = $this->getClient();
        $api = new RealmApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRealmIndex('dynamic-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetRealm(): void
    {
        $client = $this->getClient();
        $api = new RealmApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRealm('tichondrius', 'dynamic-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
