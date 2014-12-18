<?php
namespace Pwnraid\Bnet\Test\Diablo\Artisans;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest
 */
class ArtisanRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::find
     * @uses   \Pwnraid\Bnet\Core\AbstractEntity
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testFind()
    {
        $request  = new ArtisanRequest(new TestClient('d3'));
        $response = $request->find('mystic');

        $this->assertInstanceOf('\Pwnraid\Bnet\Diablo\Artisans\ArtisanEntity', $response);
        $this->assertSame('mystic', $response->slug);
    }

    /**
     * @covers ::find
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testFindInvalidId()
    {
        $request  = new ArtisanRequest(new TestClient('d3'));
        $response = $request->find('invalid');

        $this->assertNull($response);
    }
}
