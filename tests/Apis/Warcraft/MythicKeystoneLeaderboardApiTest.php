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

namespace Boo\BattleNet\Tests\Apis\Warcraft;

use Boo\BattleNet\Apis\Warcraft\MythicKeystoneLeaderboardApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * @internal
 * @coversNothing
 */
final class MythicKeystoneLeaderboardApiTest extends AbstractApiTest
{
    public function testGetMythicLeaderboardIndex(): void
    {
        $client = $this->getClient();
        $api = new MythicKeystoneLeaderboardApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMythicLeaderboardIndex(509, 'dynamic-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetMythicLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new MythicKeystoneLeaderboardApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMythicLeaderboard(509, 197, 641, 'dynamic-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
