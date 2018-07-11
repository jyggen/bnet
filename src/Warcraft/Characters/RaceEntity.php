<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Characters;

use Pwnraid\Bnet\Core\AbstractEntity;
use Pwnraid\Bnet\Exceptions\InvalidRaceException;

class RaceEntity extends AbstractEntity
{
    protected static $races = [
        1 => [
            'id' => 1,
            'mask' => 1,
            'side' => 'alliance',
            'name' => 'Human',

        ],
        2 => [
            'id' => 2,
            'mask' => 2,
            'side' => 'horde',
            'name' => 'Orc',

        ],
        3 => [
            'id' => 3,
            'mask' => 4,
            'side' => 'alliance',
            'name' => 'Dwarf',

        ],
        4 => [
            'id' => 4,
            'mask' => 8,
            'side' => 'alliance',
            'name' => 'Night Elf',

        ],
        5 => [
            'id' => 5,
            'mask' => 16,
            'side' => 'horde',
            'name' => 'Undead',

        ],
        6 => [
            'id' => 6,
            'mask' => 32,
            'side' => 'horde',
            'name' => 'Tauren',

        ],
        7 => [
            'id' => 7,
            'mask' => 64,
            'side' => 'alliance',
            'name' => 'Gnome',

        ],
        8 => [
            'id' => 8,
            'mask' => 128,
            'side' => 'horde',
            'name' => 'Troll',

        ],
        9 => [
            'id' => 9,
            'mask' => 256,
            'side' => 'horde',
            'name' => 'Goblin',
        ],
        10 => [
            'id' => 10,
            'mask' => 512,
            'side' => 'horde',
            'name' => 'Blood Elf',

        ],
        11 => [
            'id' => 11,
            'mask' => 1024,
            'side' => 'alliance',
            'name' => 'Draenei',

        ],
        22 => [
            'id' => 22,
            'mask' => 2097152,
            'side' => 'alliance',
            'name' => 'Worgen',

        ],
        24 => [
            'id' => 24,
            'mask' => 8388608,
            'side' => 'neutral',
            'name' => 'Pandaren',

        ],
        25 => [
            'id' => 25,
            'mask' => 16777216,
            'side' => 'alliance',
            'name' => 'Pandaren',

        ],
        26 => [
            'id' => 26,
            'mask' => 33554432,
            'side' => 'horde',
            'name' => 'Pandaren',

        ],
        27 => [
            'id' => 27,
            'mask' => 67108864,
            'side' => 'horde',
            'name' => 'Nightborne'
        ],
        28 => [
            'id' => 28,
            'mask' => 134217728,
            'side' => 'horde',
            'name' => 'Highmountain Tauren'
        ],
        29 => [
            'id' => 29,
            'mask' => 268435456,
            'side' => 'alliance',
            'name' => 'Void Elf'
        ],
        30 => [
            'id' => 30,
            'mask' => 536870912,
            'side' => 'alliance',
            'name' => 'Lightforged Draenei'
    ];

    public static function fromId($raceId)
    {
        if (isset(static::$races[$raceId]) === false) {
            throw new InvalidRaceException('Unknown race with ID #'.$raceId);
        }

        return new static(static::$races[$raceId]);
    }
}
