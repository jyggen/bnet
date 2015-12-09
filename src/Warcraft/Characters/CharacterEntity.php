<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

use Pwnraid\Bnet\Core\AbstractEntity;
use Pwnraid\Bnet\Utils;

class CharacterEntity extends AbstractEntity
{
    public function __construct(array $body)
    {
        parent::__construct($body);

        if (array_key_exists('class', $this->attributes) === true) {
            $this->attributes['class'] = ClassEntity::fromId($this->attributes['class']);
        }

        if (array_key_exists('race', $this->attributes) === true) {
            $this->attributes['race'] = RaceEntity::fromId($this->attributes['race']);
        }

        if (array_key_exists('thumbnail', $this->attributes) === true) {
            $this->attributes['id'] = Utils::thumbnailToId($this->attributes['thumbnail']);
        }

        if (array_key_exists('lastModified', $this->attributes) === true) {
            $this->attributes['lastModified'] = $this->attributes['lastModified'] / 1000;
            $this->attributes['lastModified'] = \DateTime::createFromFormat('U', $this->attributes['lastModified']);
        }
    }
}
