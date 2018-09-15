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

namespace Boo\BattleNet\Tests\Apis\Diablo;

use Boo\BattleNet\Apis\Diablo\OAuthApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class OAuthApiTest extends AbstractApiTest
{
    public function testGetSeasonIndex(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSeasonIndex('');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetSeason(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSeason(1, '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetSeasonLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSeasonLeaderboard(1, 'achievement-points', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetEraIndex(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getEraIndex('');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetEra(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getEra(1, '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetEraLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getEraLeaderboard(1, 'rift-barbarian', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
