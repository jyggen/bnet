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

use Boo\BattleNet\Apis\Warcraft\BossApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class BossApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_BossApi.yml
     */
    public function testGetMasterList(): void
    {
        $client = $this->getClient();
        $api = new BossApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMasterList();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_BossApi.yml
     */
    public function testGetBoss(): void
    {
        $client = $this->getClient();
        $api = new BossApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getBoss('24723');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
