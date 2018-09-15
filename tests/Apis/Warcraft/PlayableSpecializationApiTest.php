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

use Boo\BattleNet\Apis\Warcraft\PlayableSpecializationApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @covers Boo\BattleNet\Apis\Warcraft\PlayableSpecializationApi
 */
final class PlayableSpecializationApiTest extends AbstractApiTest
{
    public function testGetPlayableSpecializationIndex(): void
    {
        $client = $this->getClient();
        $api = new PlayableSpecializationApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPlayableSpecializationIndex('static-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetPlayableSpecialization(): void
    {
        $client = $this->getClient();
        $api = new PlayableSpecializationApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPlayableSpecialization(262, 'static-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
