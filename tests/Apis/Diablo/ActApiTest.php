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

use Boo\BattleNet\Apis\Diablo\ActApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\AbstractApi
 * @covers \Boo\BattleNet\Apis\Diablo\ActApi
 */
final class ActApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ActApi_GetActIndex.json
     */
    public function testGetActIndex(): void
    {
        $client = $this->getClient();
        $api = new ActApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getActIndex();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ActApi_GetAct.json
     */
    public function testGetAct(): void
    {
        $client = $this->getClient();
        $api = new ActApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAct(1);

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
