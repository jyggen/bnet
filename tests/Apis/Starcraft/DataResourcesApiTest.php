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

use Boo\BattleNet\Apis\Starcraft\DataResourcesApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * @internal
 * @coversNothing
 */
final class DataResourcesApiTest extends AbstractApiTest
{
    /**
     * @vcr Starcraft_DataResourcesApi.yml
     */
    public function testGetAchievements(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAchievements();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Starcraft_DataResourcesApi.yml
     */
    public function testGetRewards(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRewards();

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        $this->assertSame(200, $response->getStatusCode());
    }
}
