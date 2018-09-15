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

use Boo\BattleNet\Apis\Warcraft\PlayableSpecializationApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class PlayableSpecializationApiTest extends AbstractApiTest
{
    public function testGetPlayableSpecializationIndex(): void
    {
        $client = $this->getClient();
        $api = new PlayableSpecializationApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPlayableSpecializationIndex('static-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }

    public function testGetPlayableSpecialization(): void
    {
        $client = $this->getClient();
        $api = new PlayableSpecializationApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getPlayableSpecialization(262, 'static-eu', '');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));
    }
}
