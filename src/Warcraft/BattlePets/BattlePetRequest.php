<?php
namespace Pwnraid\Bnet\Warcraft\BattlePets;

use Pwnraid\Bnet\Core\AbstractRequest;

class BattlePetRequest extends AbstractRequest
{
    public function ability($abilityId)
    {
        $data = $this->client->get('battlePet/ability/'.$abilityId);

        if ($data === null) {
            return null;
        }

        return new AbilityEntity($data);
    }

    public function species($speciesId)
    {
        $data = $this->client->get('battlePet/species/'.$speciesId);

        if ($data === null) {
            return null;
        }

        return new SpeciesEntity($data);
    }
}
