<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test\Warcraft\Characters;

use Pwnraid\Bnet\Warcraft\Characters\ClassEntity;

class ClassEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testFromIdWithValidId()
    {
        $race = ClassEntity::fromId(1);

        $this->assertInstanceOf(ClassEntity::class, $race);
    }

    /**
     * @expectedException \Pwnraid\Bnet\Exceptions\InvalidClassException
     */
    public function testFromIdWithInvalidId()
    {
        ClassEntity::fromId(123);
    }
}
