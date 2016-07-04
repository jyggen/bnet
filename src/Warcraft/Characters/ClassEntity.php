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
use Pwnraid\Bnet\Exceptions\InvalidClassException;

class ClassEntity extends AbstractEntity
{
    protected static $classes = [
        1 => [
            'id' => 1,
            'mask' => 1,
            'powerType' => 'rage',
            'name' => 'Warrior',
        ],
        2 => [
            'id' => 2,
            'mask' => 2,
            'powerType' => 'mana',
            'name' => 'Paladin',
        ],
        3 => [
            'id' => 3,
            'mask' => 4,
            'powerType' => 'focus',
            'name' => 'Hunter',
        ],
        4 => [
            'id' => 4,
            'mask' => 8,
            'powerType' => 'energy',
            'name' => 'Rogue',
        ],
        5 => [
            'id' => 5,
            'mask' => 16,
            'powerType' => 'mana',
            'name' => 'Priest',
        ],
        6 => [
            'id' => 6,
            'mask' => 32,
            'powerType' => 'runic-power',
            'name' => 'Death Knight',
        ],
        7 => [
            'id' => 7,
            'mask' => 64,
            'powerType' => 'mana',
            'name' => 'Shaman',
        ],
        8 => [
            'id' => 8,
            'mask' => 128,
            'powerType' => 'mana',
            'name' => 'Mage',
        ],
        9 => [
            'id' => 9,
            'mask' => 256,
            'powerType' => 'mana',
            'name' => 'Warlock',
        ],
        10 => [
            'id' => 10,
            'mask' => 512,
            'powerType' => 'energy',
            'name' => 'Monk',
        ],
        11 => [
            'id' => 11,
            'mask' => 1024,
            'powerType' => 'mana',
            'name' => 'Druid',
        ],
    ];

    public static function fromId($classId)
    {
        if (isset(static::$classes[$classId]) === false) {
            throw new InvalidClassException('Unknown class with ID #'.$classId);
        }

        return new static(static::$classes[$classId]);
    }
}
