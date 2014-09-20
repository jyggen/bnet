<?php
namespace Pwnraid\Bnet\Test\Core;

use Mockery;
use Pwnraid\Bnet\Core\AbstractRequest;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Core\AbstractRequest
 */
class AbstractRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testAbstractRequest()
    {
        $client   = (new Mockery)->mock('\Pwnraid\Bnet\Core\AbstractClient');
        $instance = (new Mockery)->mock('\Pwnraid\Bnet\Core\AbstractRequest', [$client]);
        $this->assertInstanceOf('\Pwnraid\Bnet\Core\AbstractRequest', $instance);
    }
}
