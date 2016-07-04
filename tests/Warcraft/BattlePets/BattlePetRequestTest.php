<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;

class BattlePetRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    protected function setUp()
    {
        $this->request = new BattlePetRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_can_get_a_single_ability()
    {
        $response = $this->request->ability(640);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\AbilityEntity', $response);
        $this->assertSame(640, $response->id);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_ability_id_has_been_provided()
    {
        $response = $this->request->ability('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_get_a_pet_specie()
    {
        $response = $this->request->specie(258);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\SpeciesEntity', $response);
        $this->assertSame(258, $response->speciesId);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_specie_id_has_been_provided()
    {
        $response = $this->request->specie('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_get_all_stats()
    {
        $response = $this->request->stats(258);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(1, $response->level);
        $this->assertSame(3, $response->breedId);
        $this->assertSame(1, $response->petQualityId);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_stats_id_has_been_provided()
    {
        $response = $this->request->stats('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_be_non_default_values()
    {
        $response = $this->request->stats(258, 25, 5, 4);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(25, $response->level);
        $this->assertSame(5, $response->breedId);
        $this->assertSame(4, $response->petQualityId);
    }

    /**
     * @test
     */
    public function it_can_get_pet_types()
    {
        $response = $this->request->types();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\TypeEntity', $response[0]);
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $typeResponse = $this->request->asJson()->types();
        $statsResponse = $this->request->asJson()->stats(258);

        $this->assertJson($typeResponse);
        $this->assertJson($statsResponse);
    }
}
