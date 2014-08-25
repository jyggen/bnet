<?php
namespace Pwnraid\Bnet\Warcraft\Spells;

use Pwnraid\Bnet\Core\AbstractRequest;

class SpellRequest extends AbstractRequest
{
    public function find($spellId)
    {
        $data = $this->client->get('spell/'.$spellId);

        if ($data === null) {
            return null;
        }

        return new SpellEntity($data);
    }
}
