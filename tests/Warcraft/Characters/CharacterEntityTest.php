<?php
namespace Pwnraid\Bnet\Test\Warcraft\Characters;

use Pwnraid\Bnet\Warcraft\Characters;


class CharacterEntityTest extends \PHPUnit_Framework_TestCase
{
    protected $timezone;

    public function setUp()
    {
        parent::setUp();

        $this->timezone = date_default_timezone_get();
        date_default_timezone_set('UTC');
    }

    public function tearDown()
    {
        date_default_timezone_set($this->timezone);
        parent::tearDown();
    }

    /**
     * @test
     */
    public function it_provides_the_class_for_the_character()
    {
        $character = new Characters\CharacterEntity([
            'class' => 1,
        ]);

        $this->assertInstanceOf(Characters\ClassEntity::class, $character->class);
    }

    /**
     * @test
     */
    public function it_can_provide_the_character_id()
    {
        $character = new Characters\CharacterEntity([
            'thumbnail' => 'auchindoun/222/82213342-avatar.jpg',
        ]);

        $this->assertSame('22282213342', $character->id);
    }

    /**
     * @test
     */
    public function it_can_get_mutate_the_modified_date()
    {
        $timestamp = time();
        $character = new Characters\CharacterEntity([
            'lastModified' => ($timestamp * 1000),
        ]);

        $this->assertInstanceOf('DateTime', $character->lastModified);
        $this->assertSame(date('Y-m-d H:i:s', $timestamp), $character->lastModified->format('Y-m-d H:i:s'));
    }

    /**
     * @test
     */
    public function it_provides_the_race_for_character()
    {
        $character = new Characters\CharacterEntity([
            'race' => 1,
        ]);

        $this->assertInstanceOf(Characters\RaceEntity::class, $character->race);
    }
}
