<?php
namespace Pwnraid\Bnet\Warcraft\Spells;

use Pwnraid\Bnet\Core\AbstractRequest;

class SpellRequest extends AbstractRequest
{
    public function find($spellId)
    {
        $data = $this->client->get('spell/'.$spellId);

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new SpellEntity($data);
    }
}
