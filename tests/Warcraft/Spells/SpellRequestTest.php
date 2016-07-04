<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Spells\SpellRequest;

class SpellRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new SpellRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_finds_a_spell_by_its_id()
    {
        $response = $this->request->find(8056);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Spells\SpellEntity', $response);
        $this->assertSame(8056, $response->id);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_spell_id_is_provided()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }
}
