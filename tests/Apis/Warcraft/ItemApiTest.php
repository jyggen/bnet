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

use Boo\BattleNet\Apis\Warcraft\ItemApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\AbstractApi
 * @covers \Boo\BattleNet\Apis\Warcraft\ItemApi
 */
final class ItemApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_ItemApi_GetItem.json
     */
    public function testGetItem(): void
    {
        $client = $this->getClient();
        $api = new ItemApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItem(18803);

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_ItemApi_GetItemSet.json
     */
    public function testGetItemSet(): void
    {
        $client = $this->getClient();
        $api = new ItemApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItemSet('1060');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
