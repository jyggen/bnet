<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;

class ItemRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new ItemRequest(new TestClient('wow'));
    }
    /**
     * @test
     */
    public function it_can_get_all_possible_character_items()
    {
        $response = $this->request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ClassEntity', $response);
        $this->assertInternalType('array', $response->classes);
    }

    /**
     * @test
     */
    public function it_can_find_a_item_by_its_id()
    {
        $response = $this->request->find(18803);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(18803, $response->id);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_id_is_provided()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_find_items_with_context_by_its_id()
    {
        $response = $this->request->find(110050);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
    }

    /**
     * @test
     */
    public function it_can_find_items_with_context_and_return_the_context_as()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->withContext('dungeon-level-up-1')->find(110050);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
        $this->assertSame('dungeon-level-up-1', $response->context);
    }

    /**
     * @test
     */
    public function it_can_find_items_with_context_and_bonuses()
    {
        $response = $this->request->withContext('dungeon-level-up-1')->find(110050, [40, 41]);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(110050, $response->id);
        $this->assertSame('Dagger of the Sanguine Emeralds', $response->name);
        $this->assertSame('dungeon-level-up-1', $response->context);
        $this->assertTrue(in_array(40, $response->bonusLists));
        $this->assertTrue(in_array(41, $response->bonusLists));
    }

    /**
     * @test
     */
    public function it_can_find_itemSets_by_its_id()
    {
        $response = $this->request->findSet(1060);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemSetEntity', $response);
        $this->assertSame(1060, $response->id);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_setId_is_provided()
    {
        $response = $this->request->findSet('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $jsonSet = $this->request->asJson()->findSet(1060);
        $itemWithContext = $this->request->asJson()
                                ->withContext('dungeon-level-up-1')
                                ->find(110050, [40, 41]);
        $itemWithContextAndBonuses = $this->request->asJson()
                                  ->withContext('dungeon-level-up-1')
                                  ->find(110050, [40, 41]);
        $rawItem = $this->request->asJson()->find(110050);
        $this->assertJson($jsonSet);
        $this->assertJson($itemWithContext);
        $this->assertJson($itemWithContextAndBonuses);
        $this->assertJson($rawItem);
    }


}
