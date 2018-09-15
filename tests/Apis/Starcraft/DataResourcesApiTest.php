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

namespace Boo\BattleNet\Tests\Apis\Starcraft;

use Boo\BattleNet\Apis\Starcraft\DataResourcesApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

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

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Starcraft_DataResourcesApi.yml
     */
    public function testGetRewards(): void
    {
        $client = $this->getClient();
        $api = new DataResourcesApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRewards();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
