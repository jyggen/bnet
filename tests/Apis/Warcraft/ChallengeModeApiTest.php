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

use Boo\BattleNet\Apis\Warcraft\ChallengeModeApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class ChallengeModeApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_ChallengeModeApi.yml
     */
    public function testGetRealmLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new ChallengeModeApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRealmLeaderboard('draenor');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_ChallengeModeApi.yml
     */
    public function testGetRegionLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new ChallengeModeApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRegionLeaderboard();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
