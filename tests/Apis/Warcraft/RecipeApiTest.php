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

use Boo\BattleNet\Apis\Warcraft\RecipeApi;
use Boo\BattleNet\Tests\Apis\AbstractApiTest;

final class RecipeApiTest extends AbstractApiTest
{
    /**
     * @vcr Warcraft_RecipeApi.yml
     */
    public function testGetRecipe(): void
    {
        $client = $this->getClient();
        $api = new RecipeApi($this->getRequestFactory(), $this->getRegion(), $this->getApiKey());
        $request = $api->getRecipe('33994');

        self::assertSame('GET', $request->getMethod());
        self::assertSame('application/json', $request->getHeaderLine('Accept'));
        self::assertSame('gzip', $request->getHeaderLine('Accept-Encoding'));

        $response = $client->send($request);

        self::assertSame(200, $response->getStatusCode());
    }
}
