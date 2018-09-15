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

use Boo\BattleNet\Apis\Warcraft\GuildProfileApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @coversNothing
 */
final class GuildProfileApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_GuildProfileApi.json
     */
    public function testGetGuildProfile(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildProfile('draenor', 'Malaxnytt');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.json
     */
    public function testGetMembers(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMembers('draenor', 'Malaxnytt');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.json
     */
    public function testGetAchievements(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAchievements('draenor', 'Malaxnytt');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.json
     */
    public function testGetNews(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getNews('draenor', 'Malaxnytt');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.json
     */
    public function testGetChallenge(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getChallenge('draenor', 'Malaxnytt');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
