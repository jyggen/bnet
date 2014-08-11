<?php
namespace Pwnraid\Bnet\Warcraft\Request;

use Pwnraid\Bnet\BaseRequest;
use Pwnraid\Bnet\Warcraft\Entity\Character as CharacterEntity;

class Character extends BaseRequest
{
    protected $realm;

    public function find($name, array $fields = [])
    {
        if ($this->realm === null) {
            throw new \RuntimeException('You must set a realm name with on() before calling find().');
        }

        $data = $this->client->get('character/'.$this->realm.'/'.$name, ['query' => ['fields' => implode(',', $fields)]]);

        if ($data === null) {
            return null;
        }

        return new CharacterEntity($data);
    }

    public function on($realm)
    {
        $this->realm = $realm;
        return $this;
    }
}
