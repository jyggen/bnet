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

use Boo\BattleNet\Apis\Diablo\ItemTypeApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\Diablo\ItemTypeApi
 */
final class ItemTypeApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ItemTypeApi.json
     */
    public function testGetItemTypeIndex(): void
    {
        $client = $this->getClient();
        $api = new ItemTypeApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItemTypeIndex();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ItemTypeApi.json
     */
    public function testGetItemType(): void
    {
        $client = $this->getClient();
        $api = new ItemTypeApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItemType('sword2h');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
