<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest
 */
class RecipeRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::find
     */
    public function testFind()
    {
        $request  = new RecipeRequest(new TestClient('wow'));
        $response = $request->find(33994);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Recipes\RecipeEntity', $response);
        $this->assertSame(33994, $response->id);
    }

    /**
     * @covers ::find
     */
    public function testFindInvalidId()
    {
        $request  = new RecipeRequest(new TestClient('wow'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
