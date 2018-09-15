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

use Boo\BattleNet\Apis\Warcraft\DataResourcesApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class DataResourcesApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetBattlegroups(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getBattlegroups();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetCharacterRaces(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterRaces();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetCharacterClasses(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterClasses();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetCharacterAchievements(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterAchievements();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetGuildRewards(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildRewards();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetGuildPerks(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildPerks();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetGuildAchievements(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildAchievements();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetItemClasses(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItemClasses();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetTalents(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getTalents();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_DataResourcesApi.yml
     */
    public function testGetPetTypes(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPetTypes();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
