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

use Boo\BattleNet\Apis\Diablo\ItemApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * @internal
 * @coversNothing
 */
final class ItemApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ItemApi.json
     */
    public function testGetItem(): void
    {
        $client = $this->getClient();
        $api = new ItemApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItem('corrupted-ashbringer-Unique_Sword_2H_104_x1');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
