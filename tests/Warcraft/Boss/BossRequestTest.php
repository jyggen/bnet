<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 19/06/2016
 * Time: 17.10
 */

namespace Pwnraid\Bnet\Tests\Warcraft\Boss;


use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Boss\BossEntity;
use Pwnraid\Bnet\Warcraft\Boss\BossRequest;

class BossRequestTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->request = new BossRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_can_get_all_bosses()
    {
        $response = $this->request->all();
        $this->assertInstanceOf(BossEntity::class, $response[0]);
        $this->assertEquals(24723, $response[0]->id);
    }

    /**
     * @test
     */
    public function it_can_be_raw_json()
    {
        $allBosses = $this->request->asJson()->all();
        $singleBoss = $this->request->asJson()->find(24723);
        $this->assertJson($allBosses);
        $this->assertJson($singleBoss);
    }

    /**
     * @test
     */
    public function it_can_get_a_single_boss_by_its_id()
    {
        $response = $this->request->find(24723);

        $this->assertInstanceOf(BossEntity::class, $response);
        $this->assertEquals(24723, $response->id);
    }

}