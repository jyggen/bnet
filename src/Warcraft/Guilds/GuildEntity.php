<?php
namespace Pwnraid\Bnet\Warcraft\Guilds;

use Pwnraid\Bnet\Core\AbstractEntity;
use Pwnraid\Bnet\Warcraft\Characters\CharacterEntity;

class GuildEntity extends AbstractEntity
{
    public function __construct(array $body) {

        parent::__construct($body);

        if(array_key_exists('members', $this->attributes) === true) {
            foreach($this->attributes['members'] as $key => $member) {
                $this->attributes['members'][$key]['character'] = new CharacterEntity($member);
            }
        }
    }
}
