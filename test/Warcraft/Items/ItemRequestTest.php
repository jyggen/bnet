<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Items\ItemRequest
 */
class ItemRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::classes
     */
    public function testClasses()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->classes();

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ClassEntity', $response);
        $this->assertInternalType('array', $response->classes);
    }

    /**
     * @covers ::find
     */
    public function testFind()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->find(18803);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemEntity', $response);
        $this->assertSame(18803, $response->id);
    }

    /**
     * @covers ::find
     */
    public function testFindInvalidId()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }

    /**
     * @covers ::findSet
     */
    public function testFindSet()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->findSet(1060);

        $this->assertInstanceOf('\Pwnraid\Bnet\Warcraft\Items\ItemSetEntity', $response);
        $this->assertSame(1060, $response->id);
    }

    /**
     * @covers ::findSet
     */
    public function testFindInvalidIdSet()
    {
        $request  = new ItemRequest(new TestClient('wow'));
        $response = $request->findSet('invalid');

        $this->assertNull($response);
    }
}
