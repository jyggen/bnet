<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Core;

use Mockery;

class AbstractRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testAbstractRequest()
    {
        $client = (new Mockery())->mock('\Pwnraid\Bnet\Core\AbstractClient');
        $instance = (new Mockery())->mock('\Pwnraid\Bnet\Core\AbstractRequest', [$client]);
        $this->assertInstanceOf('\Pwnraid\Bnet\Core\AbstractRequest', $instance);
    }
}
