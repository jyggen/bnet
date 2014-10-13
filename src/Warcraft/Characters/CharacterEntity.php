<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

use Pwnraid\Bnet\Core\AbstractEntity;
use Pwnraid\Bnet\Utility;

class CharacterEntity extends AbstractEntity
{
    public function __construct(array $body)
    {
        parent::__construct($body);

        if (array_key_exists('thumbnail', $this->attributes)) {
            $this->attributes['id'] = Utility::thumbnailToId($this->attributes['thumbnail']);
        }

        if (array_key_exists('lastModified', $this->attributes)) {
            $this->attributes['lastModified'] = \DateTime::createFromFormat('U', ($this->attributes['lastModified'] / 1000));
        }
    }
}
