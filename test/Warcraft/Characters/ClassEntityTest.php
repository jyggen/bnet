<?php
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
     * @expectedException Pwnraid\Bnet\Exceptions\InvalidClassException
     */
    public function testFromIdWithInvalidId()
    {
        ClassEntity::fromId(123);
    }
}
