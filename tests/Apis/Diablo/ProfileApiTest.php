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

use Boo\BattleNet\Apis\Diablo\ProfileApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers Boo\BattleNet\Apis\Diablo\ProfileApi
 */
final class ProfileApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ProfileApi.json
     */
    public function testGetApiAccount(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiAccount('StingDuck-2452');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ProfileApi.json
     */
    public function testGetApiHero(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiHero('StingDuck-2452', '111436732');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ProfileApi.json
     */
    public function testGetApiDetailedHeroItems(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiDetailedHeroItems('StingDuck-2452', '111436732');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ProfileApi.json
     */
    public function testGetApiDetailedFollowerItems(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiDetailedFollowerItems('StingDuck-2452', '111436732');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
