<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Realms\RealmRequest
 */
class RealmRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::all
     */
    public function testAll()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->all();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response);
        $this->assertInternalType('array', $response->realms);
    }

    /**
     * @covers ::battlegroups
     */
    public function testBattlegroups()
    {
        $request  = new RealmRequest(new TestClient('wow'));
        $response = $request->battlegroups();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\BattlegroupEntity', $response);
        $this->assertInternalType('array', $response->battlegroups);
    }
}
