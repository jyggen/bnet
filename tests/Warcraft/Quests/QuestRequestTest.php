<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestCase;
use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Quests\QuestRequest;

class QuestRequestTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new QuestRequest(new TestClient('wow'));
    }

    /**
     * @test
     */
    public function it_finds_a_quest()
    {
        $response = $this->request->find(13146);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Quests\QuestEntity', $response);
        $this->assertSame(13146, $response->id);
    }
    /*
     * @test
     */
    public function it_returns_null_if_invalid_quest_id_is_provided()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }

    /**
     * @test
     */
    public function it_can_be_returned_as_json()
    {
        $response = $this->request->asJson()->find(13146);
        $this->assertJson($response);
    }
}
