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

use Boo\BattleNet\Apis\Diablo\ActApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class ActApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ActApi.yml
     */
    public function testGetActIndex(): void
    {
        $client = $this->getClient();
        $api = new ActApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getActIndex();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ActApi.yml
     */
    public function testGetAct(): void
    {
        $client = $this->getClient();
        $api = new ActApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getAct(1);

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
