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

use Boo\BattleNet\Apis\Warcraft\SpellApi;
use Boo\BattleNet\RequestFactoryInterface;
use Boo\BattleNet\Tests\Apis\AbstractApiTestCase;
use Fig\Http\Message\RequestMethodInterface;
use Psr\Http\Message\RequestInterface;

final class SpellApiTest extends AbstractApiTestCase
{
    public function testConstructor()
    {
        $zoneApi = new SpellApi($this->mockFactory);

        $this->assertInstanceOf(SpellApi::class, $zoneApi);
    }

    public function testGetSpellAgainstMock()
    {
        $zoneApi = new SpellApi($this->mockFactory);
        $request = $zoneApi->getSpell(8056);

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertSame(RequestMethodInterface::METHOD_GET, $request->getMethod());
        $this->assertSame('wow/spell/8056', $request->getRequestTarget());
    }
}
