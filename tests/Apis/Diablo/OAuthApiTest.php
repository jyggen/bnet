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

use Boo\BattleNet\Apis\Diablo\OAuthApi;
use Boo\BattleNet\Regions;
use Http\Factory\Guzzle\RequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;

final class OAuthApiTest extends TestCase
{
    /**
     * @return array<int, array<int, RequestFactoryInterface>>
     */
    public function requestFactoryProvider(): array
    {
        return [
            [
                new RequestFactory(),
            ],
        ];
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetSeasonIndex(RequestFactoryInterface $factory): void
    {
        $api = new OAuthApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getSeasonIndex();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetSeason(RequestFactoryInterface $factory): void
    {
        $api = new OAuthApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getSeason(1);

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetSeasonLeaderboard(RequestFactoryInterface $factory): void
    {
        $api = new OAuthApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getSeasonLeaderboard(1, 'achievement-points');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetEraIndex(RequestFactoryInterface $factory): void
    {
        $api = new OAuthApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getEraIndex();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetEra(RequestFactoryInterface $factory): void
    {
        $api = new OAuthApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getEra(1);

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetEraLeaderboard(RequestFactoryInterface $factory): void
    {
        $api = new OAuthApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getEraLeaderboard(1, 'rift-barbarian');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
