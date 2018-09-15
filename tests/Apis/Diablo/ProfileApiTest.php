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

use Boo\BattleNet\Apis\Diablo\ProfileApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class ProfileApiTest extends AbstractApiTest
{
    /**
     * @vcr Diablo_ProfileApi.yml
     */
    public function testGetApiAccount(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiAccount('StingDuck-2452');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ProfileApi.yml
     */
    public function testGetApiHero(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiHero('StingDuck-2452', '111436732');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ProfileApi.yml
     */
    public function testGetApiDetailedHeroItems(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiDetailedHeroItems('StingDuck-2452', '111436732');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }

    /**
     * @vcr Diablo_ProfileApi.yml
     */
    public function testGetApiDetailedFollowerItems(): void
    {
        $client = $this->getClient();
        $api = new ProfileApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getApiDetailedFollowerItems('StingDuck-2452', '111436732');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
