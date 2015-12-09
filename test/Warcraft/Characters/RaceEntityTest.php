<?php
namespace Pwnraid\Bnet\Test\Warcraft\Characters;

use Pwnraid\Bnet\Warcraft\Characters\RaceEntity;


class RaceEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testFromIdWithValidId()
    {
        $race = RaceEntity::fromId(1);

        $this->assertInstanceOf(RaceEntity::class, $race);
    }

    /**
     * @expectedException Pwnraid\Bnet\Exceptions\InvalidRaceException
     */
    public function testFromIdWithInvalidId()
    {
        RaceEntity::fromId(123);
    }
}
