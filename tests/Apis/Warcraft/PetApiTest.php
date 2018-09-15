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

use Boo\BattleNet\Apis\Warcraft\PetApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class PetApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_PetApi.yml
     */
    public function testGetMasterList(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMasterList();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_PetApi.yml
     */
    public function testGetAbilities(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAbilities('640');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_PetApi.yml
     */
    public function testGetSpecies(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSpecies('258');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_PetApi.yml
     */
    public function testGetStats(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getStats('258', 25, 5, 4);

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
