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

    public function testClassAttribute()
    {
        $character = new Characters\CharacterEntity([
            'class' => 1,
        ]);

        $this->assertInstanceOf(Characters\ClassEntity::class, $character->class);
    }

    public function testIdAttribute()
    {
        $character = new Characters\CharacterEntity([
            'thumbnail' => 'auchindoun/222/82213342-avatar.jpg',
        ]);

        $this->assertSame('22282213342', $character->id);
    }

    public function testLastModifiedAttribute()
    {
        $timestamp = time();
        $character = new Characters\CharacterEntity([
            'lastModified' => ($timestamp * 1000),
        ]);

        $this->assertInstanceOf('DateTime', $character->lastModified);
        $this->assertSame(date('Y-m-d H:i:s', $timestamp), $character->lastModified->format('Y-m-d H:i:s'));
    }

    public function testRaceAttribute()
    {
        $character = new Characters\CharacterEntity([
            'race' => 1,
        ]);

        $this->assertInstanceOf(Characters\RaceEntity::class, $character->race);
    }
}
