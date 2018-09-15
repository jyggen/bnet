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

use Boo\BattleNet\Apis\Warcraft\CharacterProfileApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers Boo\BattleNet\Apis\Warcraft\CharacterProfileApi
 */
final class CharacterProfileApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetCharacterProfile(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterProfile('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetAchievements(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAchievements('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetAppearance(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAppearance('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetFeed(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getFeed('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetGuild(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuild('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetHunterPets(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getHunterPets('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetItems(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItems('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetMounts(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMounts('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetPets(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPets('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetPetSlots(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPetSlots('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetProfessions(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getProfessions('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetProgression(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getProgression('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetPVP(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPVP('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetQuests(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getQuests('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetReputation(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getReputation('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetStatistics(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getStatistics('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetStats(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getStats('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetTalents(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getTalents('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetTitles(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getTitles('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.json
     */
    public function testGetAudit(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAudit('draenor', 'Jyggen');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
