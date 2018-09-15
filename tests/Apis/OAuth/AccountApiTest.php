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

namespace Boo\BattleNet\Tests\Apis\OAuth;

use Boo\BattleNet\Apis\OAuth\AccountApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class AccountApiTest extends AbstractApiTest
{
    public function testGetUser(): void
    {
        $client = $this->getClient();
        $api = new AccountApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getUser('');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
