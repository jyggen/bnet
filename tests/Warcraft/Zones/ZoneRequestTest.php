<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 19/06/2016
 * Time: 14.20
 */

namespace Pwnraid\Bnet\Tests\Warcraft\Zones;


use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Zones\ZoneEntity;
use Pwnraid\Bnet\Warcraft\Zones\ZoneRequest;

class ZoneRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new ZoneRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_can_get_all_zones()
    {
        $response = $this->request->all();

        $this->assertInstanceOf(ZoneEntity::class, $response[0]);
    }

    /**
     * @test
     */
    public function it_gets_a_single_zone()
    {
        $response = $this->request->find(4131);

        $this->assertInstanceOf(ZoneEntity::class, $response);
        $this->assertEquals('Magister\'s Terrace', $response->name);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_zone_id_is_provided()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $single = $this->request->asJson()->find(4131);
        $all = $this->request->asJson()->all();
        $this->assertJson($single);
        $this->assertJson($all);
    }
}