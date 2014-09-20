<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\ClientFactory;
use Pwnraid\Bnet\Region;
use Stash\Driver\Ephemeral;
use Stash\Pool;

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
        $request  = $this->getRequest();
        $response = $request->ability(640);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\BattlePets\AbilityEntity', $response);
        $this->assertSame(640, $response->id);
    }

    /**
     * @covers ::ability
     */
    public function testAbilityInvalidId()
    {
        $request  = $this->getRequest();
        $response = $request->ability('invalid');

        $this->assertNull($response);
    }

    protected function getRequest()
    {
        $pool     = new Pool(new Ephemeral());
        $warcraft = (new ClientFactory($_SERVER['key'], $pool))->warcraft(new Region(REGION::EUROPE));

        return $warcraft->battlePets();
    }
}
