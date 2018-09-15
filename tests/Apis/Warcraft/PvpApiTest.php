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

use Boo\BattleNet\Apis\Warcraft\PvpApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * @internal
 * @coversNothing
 */
final class PvpApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_PvpApi.yml
     */
    public function testGetLeaderboards(): void
    {
        $client = $this->getClient();
        $api = new PvpApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getLeaderboards('2v2');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
