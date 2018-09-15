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

namespace Boo\BattleNet\Tests\Apis\OAuth;

use Boo\BattleNet\Apis\OAuth\AccountApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 *
 * @internal
 * @coversNothing
 */
final class AccountApiTest extends AbstractApiTest
{
    public function testGetUser(): void
    {
        $client = $this->getClient();
        $api = new AccountApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getUser('');

        $this->assertSame('GET', $request->getMethod());
        $this->assertSame('application/json', $request->getHeaderLine('Accept'));
        $this->assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
