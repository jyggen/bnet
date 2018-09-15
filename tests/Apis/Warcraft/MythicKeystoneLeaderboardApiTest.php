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

use Boo\BattleNet\Apis\Warcraft\MythicKeystoneLeaderboardApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class MythicKeystoneLeaderboardApiTest extends AbstractApiTest
{
    public function testGetMythicLeaderboardIndex(): void
    {
        $client = $this->getClient();
        $api = new MythicKeystoneLeaderboardApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMythicLeaderboardIndex(509, 'dynamic-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetMythicLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new MythicKeystoneLeaderboardApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMythicLeaderboard(509, 197, 641, 'dynamic-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
