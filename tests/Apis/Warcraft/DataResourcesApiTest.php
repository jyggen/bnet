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

use Boo\BattleNet\Apis\Warcraft\DataResourcesApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\Warcraft\DataResourcesApi
 */
final class DataResourcesApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetBattlegroups(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getBattlegroups();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetCharacterRaces(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterRaces();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetCharacterClasses(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterClasses();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetCharacterAchievements(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterAchievements();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetGuildRewards(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildRewards();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetGuildPerks(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildPerks();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetGuildAchievements(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildAchievements();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetItemClasses(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItemClasses();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetTalents(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getTalents();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.json
     */
    public function testGetPetTypes(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPetTypes();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
