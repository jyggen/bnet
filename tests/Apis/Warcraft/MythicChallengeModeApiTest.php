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

use Boo\BattleNet\Apis\Warcraft\MythicChallengeModeApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * @internal
 * @coversNothing
 */
final class MythicChallengeModeApiTest extends AbstractApiTest
{
    public function testGetMythicChallengeModeIndex(): void
    {
        $client = $this->getClient();
        $api = new MythicChallengeModeApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getMythicChallengeModeIndex('dynamic-eu', '');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
