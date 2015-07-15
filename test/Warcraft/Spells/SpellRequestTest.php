<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Spells\SpellRequest;

class SpellRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $request  = new SpellRequest(new TestClient('wow'));
        $response = $request->find(8056);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Spells\SpellEntity', $response);
        $this->assertSame(8056, $response->id);
    }

    public function testFindInvalidId()
    {
        $request  = new SpellRequest(new TestClient('wow'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
