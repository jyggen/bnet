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

namespace Boo\BattleNet\Tests\Apis\Diablo;

use Boo\BattleNet\Apis\Diablo\ItemApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class ItemApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ItemApi.yml
     */
    public function testGetItem(): void
    {
        $client = $this->getClient();
        $api = new ItemApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getItem('corrupted-ashbringer-Unique_Sword_2H_104_x1');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
