<?php
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
