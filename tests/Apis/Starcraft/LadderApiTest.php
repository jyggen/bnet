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

namespace Boo\BattleNet\Tests\Apis\Starcraft;

use Boo\BattleNet\Apis\Starcraft\LadderApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\Starcraft\LadderApi
 */
final class LadderApiTest extends AbstractApiTest
{
    /**
     * @vcr Starcraft_LadderApi.json
     */
    public function testGetLadder(): void
    {
        $client = $this->getClient();
        $api = new LadderApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getLadder('206822');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
