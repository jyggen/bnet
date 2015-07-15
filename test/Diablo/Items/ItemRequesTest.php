<?php
namespace Pwnraid\Bnet\Test\Diablo\Items;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Diablo\Items\ItemRequest;

class ItemRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testFind()
    {
        $request  = new ItemRequest(new TestClient('d3'));
        $response = $request->find('VoodooMask_206');

        $this->assertInstanceOf('\Pwnraid\Bnet\Diablo\Items\ItemEntity', $response);
        $this->assertSame('VoodooMask_206', $response->id);
    }

    public function testFindInvalidId()
    {
        $request  = new ItemRequest(new TestClient('d3'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
