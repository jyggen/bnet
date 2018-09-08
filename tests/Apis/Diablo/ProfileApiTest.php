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
use Boo\BattleNet\Regions;
use Http\Factory\Guzzle\RequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;

final class ProfileApiTest extends TestCase
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
    public function testGetApiAccount(RequestFactoryInterface $factory): void
    {
        $api = new ProfileApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getApiAccount('');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetApiHero(RequestFactoryInterface $factory): void
    {
        $api = new ProfileApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getApiHero('', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetApiDetailedHeroItems(RequestFactoryInterface $factory): void
    {
        $api = new ProfileApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getApiDetailedHeroItems('', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetApiDetailedFollowerItems(RequestFactoryInterface $factory): void
    {
        $api = new ProfileApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getApiDetailedFollowerItems('', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
