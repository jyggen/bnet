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

class BossRequestTest extends \PHPUnit_Framework_TestCase
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
        $singleBoss = $this->request->asJson()->find(24744);
        $this->assertJson($allBosses);
        $this->assertJson($singleBoss);
    }

    /**
     * @test
     */
    public function it_can_get_a_single_boss_by_its_id()
    {
        $response = $this->request->find(24744);

        $this->assertInstanceOf(BossEntity::class, $response);
        $this->assertEquals(24744, $response->id);
    }

    /**
     * @test
     */
    public function it_returns_null_if_invalid_id_has_been_provided()
    {
        $response = $this->request->find(24745);

        $this->assertNull($response);
    }
}