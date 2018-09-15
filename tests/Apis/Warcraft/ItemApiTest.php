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

use Boo\BattleNet\Apis\Warcraft\ItemApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class ItemApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_ItemApi.yml
     */
    public function testGetItem(): void
    {
        $client = $this->getClient();
        $api = new ItemApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItem(18803);

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Warcraft_ItemApi.yml
     */
    public function testGetItemSet(): void
    {
        $client = $this->getClient();
        $api = new ItemApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItemSet('1060');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
