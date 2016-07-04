<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest;

class RecipeRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new RecipeRequest(new TestClient('wow'));
    }

    public function testFind()
    {
        $response = $this->request->find(33994);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Recipes\RecipeEntity', $response);
        $this->assertSame(33994, $response->id);
    }

    public function testFindInvalidId()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }
}
