<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\BattlePets;

use Pwnraid\Bnet\Core\AbstractEntity;

class SpeciesEntity extends AbstractEntity
{
    public function __construct(array $body)
    {
        parent::__construct($body);

        foreach ($this->attributes['abilities'] as &$ability) {
            $ability = new AbilityEntity($ability);
        }
    }
}
