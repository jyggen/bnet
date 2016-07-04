<?php
namespace Pwnraid\Bnet\Test\Warcraft\Characters;

use Pwnraid\Bnet\Warcraft\Characters\RaceEntity;


class RaceEntityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_convert_to_correct_id()
    {
        $race = RaceEntity::fromId(1);

        $this->assertInstanceOf(RaceEntity::class, $race);
    }

    /**
     * @test
     * @expectedException \Pwnraid\Bnet\Exceptions\InvalidRaceException
     */
    public function it_throws_exception_if_the_id_is_invalid()
    {
        RaceEntity::fromId(123);
    }
}
