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

use Boo\BattleNet\Apis\Starcraft\LadderApi;
use Boo\BattleNet\Regions;
use Http\Factory\Guzzle\RequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;

final class LadderApiTest extends TestCase
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
    public function testGetLadder(RequestFactoryInterface $factory): void
    {
        $api = new LadderApi($factory, new Regions\EU(), 'foobar');
        $request = $api->getLadder('655');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
