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

use Boo\BattleNet\Apis\Warcraft\DataResourcesApi;
use Boo\BattleNet\Regions;
use Http\Factory\Guzzle\RequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;

final class DataResourcesApiTest extends TestCase
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
    public function testGetBattlegroups(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getBattlegroups();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetCharacterRaces(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getCharacterRaces();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetCharacterClasses(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getCharacterClasses();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetCharacterAchievements(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getCharacterAchievements();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetGuildRewards(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getGuildRewards();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetGuildPerks(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getGuildPerks();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetGuildAchievements(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getGuildAchievements();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetItemClasses(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getItemClasses();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetTalents(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getTalents();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    /**
     * @dataProvider requestFactoryProvider
     */
    public function testGetPetTypes(RequestFactoryInterface $factory): void
    {
        $api = new DataResourcesApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getPetTypes();

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
