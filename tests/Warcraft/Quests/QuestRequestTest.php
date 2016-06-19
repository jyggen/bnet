<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Quests\QuestRequest;

class QuestRequestTest extends \PHPUnit_Framework_TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new QuestRequest(new TestClient('wow'));
    }

    public function testFind()
    {
        $response = $this->request->find(13146);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Quests\QuestEntity', $response);
        $this->assertSame(13146, $response->id);
    }

    public function testFindInvalidId()
    {
        $response = $this->request->find('invalid');

        $this->assertNull($response);
    }
}
