<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet\Tests\Apis\Warcraft;

use Boo\BattleNet\Apis\Warcraft\PlayableClassApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers \Boo\BattleNet\Apis\AbstractApi
 * @covers \Boo\BattleNet\Apis\Warcraft\PlayableClassApi
 */
final class PlayableClassApiTest extends AbstractApiTest
{
    public function testGetPlayableClassesIndex(): void
    {
        $client = $this->getClient();
        $api = new PlayableClassApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPlayableClassesIndex('static-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetPlayableClass(): void
    {
        $client = $this->getClient();
        $api = new PlayableClassApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPlayableClass(7, 'static-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
