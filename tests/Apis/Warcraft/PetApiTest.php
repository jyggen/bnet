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

use Boo\BattleNet\Apis\Warcraft\PetApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\Warcraft\PetApi
 */
final class PetApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_PetApi.json
     */
    public function testGetMasterList(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMasterList();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_PetApi.json
     */
    public function testGetAbilities(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAbilities('640');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_PetApi.json
     */
    public function testGetSpecies(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getSpecies('258');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_PetApi.json
     */
    public function testGetStats(): void
    {
        $client = $this->getClient();
        $api = new PetApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getStats('258', 25, 5, 4);

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
