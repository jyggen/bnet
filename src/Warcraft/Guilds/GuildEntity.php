<?php
namespace Pwnraid\Bnet\Warcraft\Guilds;

use Pwnraid\Bnet\Core\AbstractEntity;
use Pwnraid\Bnet\Warcraft\Characters\CharacterEntity;

class GuildEntity extends AbstractEntity
{
	public function __construct(array $body)
	{
		parent::__construct($body);

		if(array_key_exists('members', $this->attributes))
		{
			foreach ($this->attributes['members'] as $key => $value) {
				$this->attributes['members'][$key]['character'] = new CharacterEntity($value['character']);
			}
		}	
	}
}
