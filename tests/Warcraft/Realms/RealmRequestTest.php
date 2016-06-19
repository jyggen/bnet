<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;

class RealmRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new RealmRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_finds_all_realms()
    {
        $response = $this->request->all();

        $this->assertInternalType('array', $response);
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
    }
    /**
     * @test
     */
    public function it_finds_a_single_realm_by_its_name()
    {
        $response = $this->request->find('Argent Dawn');

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response);
        $this->assertSame('Argent Dawn', $response->name);

        $response_with_array = $this->request->find(['Argent Dawn']);

        $this->assertInternalType('array', $response_with_array);
        $this->assertSame(1, count($response_with_array));
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response_with_array[0]);
        $this->assertSame('Argent Dawn', $response_with_array[0]->name);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_name_is_provided()
    {
        $response = $this->request->find('Invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_finds_multiple_realms()
    {
        $response = $this->request->find(['Argent Dawn', 'Auchindoun']);

        $this->assertInternalType('array', $response);
        $this->assertSame(2, count($response));
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\RealmEntity', $response[0]);
    }

    /**
     * @test
     * @expectedException        RuntimeException
     * @expectedExceptionMessage Unable to fetch all requested realms
     */
    public function it_fails_if_invalid_name_is_provided()
    {
        $this->request->find(['Argant Dewn', 'Auchindoun']);
    }

    /**
     * @test
     */
    public function it_finds_all_battlegroups()
    {
        $response = $this->request->battlegroups();
        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Realms\BattlegroupEntity', $response[0]);
        $this->assertEquals('sturmangriff-charge', $response[6]->slug);
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $response = $this->request->asJson()->find(['Argent Dawn', 'Auchindoun']);

        $this->assertJson($response);
    }
}
