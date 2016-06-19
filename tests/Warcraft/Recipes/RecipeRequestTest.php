<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest;

class RecipeRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();
        $this->request = new RecipeRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_finds_a_recipe_by_its_id()
    {
        $response = $this->request->find(33994);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Recipes\RecipeEntity', $response);
        $this->assertSame(33994, $response->id);
    }
    /**
     * @test
     */
    public function it_returns_null_if_invalid_id_is_provided()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }
}
