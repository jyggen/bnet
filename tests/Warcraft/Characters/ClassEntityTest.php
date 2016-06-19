<?php
namespace Pwnraid\Bnet\Test\Warcraft\Characters;

use Pwnraid\Bnet\Warcraft\Characters\ClassEntity;


class ClassEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_covert_to_correct_id()
    {
        $race = ClassEntity::fromId(1);

        $this->assertInstanceOf(ClassEntity::class, $race);
    }

    /**
     * @test
     * @expectedException \Pwnraid\Bnet\Exceptions\InvalidClassException
     */
    public function it_throws_exception_if_the_id_is_invalid()
    {
        ClassEntity::fromId(123);
    }
}
