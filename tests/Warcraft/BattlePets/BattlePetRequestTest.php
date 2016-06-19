<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;

class BattlePetRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    protected function setUp()
    {
        $this->request = new BattlePetRequest(new TestClient('wow'));
    }

    public function testAbility()
    {
        $response = $this->request->ability(640);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\AbilityEntity', $response);
        $this->assertSame(640, $response->id);
    }

    public function testAbilityInvalidId()
    {
        $response = $this->request->ability('invalid');

        $this->assertNull($response);
    }

    public function testSpecies()
    {
        $response = $this->request->species(258);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\SpeciesEntity', $response);
        $this->assertSame(258, $response->speciesId);
    }

    public function testSpeciesInvalidId()
    {
        $response = $this->request->species('invalid');

        $this->assertNull($response);
    }

    public function testStats()
    {
        $response = $this->request->stats(258);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(1, $response->level);
        $this->assertSame(3, $response->breedId);
        $this->assertSame(1, $response->petQualityId);
    }

    public function testStatsInvalidId()
    {
        $response = $this->request->stats('invalid');

        $this->assertNull($response);
    }

    public function testStatsNotDefault()
    {
        $response = $this->request->stats(258, 25, 5, 4);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(25, $response->level);
        $this->assertSame(5, $response->breedId);
        $this->assertSame(4, $response->petQualityId);
    }

    public function testType()
    {
        $response = $this->request->types();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\TypeEntity', $response[0]);
    }
}
