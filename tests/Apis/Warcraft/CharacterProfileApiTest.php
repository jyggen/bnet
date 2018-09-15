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

use Boo\BattleNet\Apis\Warcraft\CharacterProfileApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class CharacterProfileApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetCharacterProfile(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getCharacterProfile('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetAchievements(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAchievements('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetAppearance(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAppearance('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetFeed(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getFeed('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetGuild(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuild('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetHunterPets(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getHunterPets('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetItems(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItems('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetMounts(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMounts('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetPets(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPets('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetPetSlots(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPetSlots('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetProfessions(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getProfessions('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetProgression(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getProgression('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetPVP(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPVP('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetQuests(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getQuests('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetReputation(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getReputation('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetStatistics(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getStatistics('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetStats(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getStats('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetTalents(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getTalents('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetTitles(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getTitles('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_CharacterProfileApi.yml
     */
    public function testGetAudit(): void
    {
        $client = $this->getClient();
        $api = new CharacterProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAudit('draenor', 'Jyggen');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
