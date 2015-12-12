<?php

namespace Pwnraid\Test\Warcraft\Mount;

use Pwnraid\Bnet\Test\TestClient;
use Pwnraid\Bnet\Warcraft\Mount\MountRequest;

class MountRequestTest extends \PHPUnit_Framework_TestCase {

	public function testall()
	{
		$response = (new MountRequest(new TestClient('wow')))->all();

		$this->assertInternalType('array', $response);
		$this->assertSame('Grey Riding Yak', $response[0]->name);
		$this->assertInternalType('int', $response[1]->itemId);			
	}
}