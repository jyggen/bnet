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

use Boo\BattleNet\Apis\Warcraft\GuildProfileApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class GuildProfileApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_GuildProfileApi.yml
     */
    public function testGetGuildProfile(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getGuildProfile('draenor', 'Malaxnytt');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.yml
     */
    public function testGetMembers(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMembers('draenor', 'Malaxnytt');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.yml
     */
    public function testGetAchievements(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAchievements('draenor', 'Malaxnytt');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.yml
     */
    public function testGetNews(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getNews('draenor', 'Malaxnytt');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_GuildProfileApi.yml
     */
    public function testGetChallenge(): void
    {
        $client = $this->getClient();
        $api = new GuildProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getChallenge('draenor', 'Malaxnytt');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
