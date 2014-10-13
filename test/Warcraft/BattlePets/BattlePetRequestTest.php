<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest
 */
class BattlePetRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::ability
     */
    public function testAbility()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->ability(640);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\AbilityEntity', $response);
        $this->assertSame(640, $response->id);
    }

    /**
     * @covers ::ability
     */
    public function testAbilityInvalidId()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->ability('invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::species
     */
    public function testSpecies()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->species(258);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\SpeciesEntity', $response);
        $this->assertSame(258, $response->speciesId);
    }

    /**
     * @covers ::species
     */
    public function testSpeciesInvalidId()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->species('invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::stats
     */
    public function testStats()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->stats(258);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(1, $response->level);
        $this->assertSame(3, $response->breedId);
        $this->assertSame(1, $response->petQualityId);
    }

    /**
     * @covers ::stats
     */
    public function testStatsInvalidId()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->stats('invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::stats
     */
    public function testStatsNotDefault()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->stats(258, 25, 5, 4);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\StatsEntity', $response);
        $this->assertSame(258, $response->speciesId);
        $this->assertSame(25, $response->level);
        $this->assertSame(5, $response->breedId);
        $this->assertSame(4, $response->petQualityId);
    }

    /**
     * @covers ::types
     */
    public function testType()
    {
        $request  = new BattlePetRequest(new TestClient('wow'));
        $response = $request->types();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\TypeEntity', $response[0]);
    }
}
