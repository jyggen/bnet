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

namespace Boo\BattleNet\Tests\Apis\Diablo;

use Boo\BattleNet\Apis\Diablo\OAuthApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * @internal
 * @coversNothing
 */
final class OAuthApiTest extends AbstractApiTest
{
    public function testGetSeasonIndex(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSeasonIndex('');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetSeason(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSeason(1, '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetSeasonLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSeasonLeaderboard(1, 'achievement-points', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetEraIndex(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getEraIndex('');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetEra(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getEra(1, '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetEraLeaderboard(): void
    {
        $client = $this->getClient();
        $api = new OAuthApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getEraLeaderboard(1, 'rift-barbarian', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
