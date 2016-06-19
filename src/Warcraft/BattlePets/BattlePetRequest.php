<?php
namespace Pwnraid\Bnet\Warcraft\BattlePets;

use Pwnraid\Bnet\Core\AbstractRequest;

class BattlePetRequest extends AbstractRequest
{
    public function ability($abilityId)
    {
        $data = $this->client->get('pet/ability/'.$abilityId);

        if ($data === null) {
            return null;
        }

        return new AbilityEntity($data);
    }

    public function species($speciesId)
    {
        $data = $this->client->get('pet/species/'.$speciesId);

        if ($data === null) {
            return null;
        }

        return new SpeciesEntity($data);
    }

    public function stats($speciesId, $level = 1, $breedId = 3, $qualityId = 1)
    {
        $data = $this->client->get('pet/stats/'.$speciesId, [
            'query' => [
                'level'     => $level,
                'breedId'   => $breedId,
                'qualityId' => $qualityId,
            ],
        ]);

        if ($data === null) {
            return null;
        }

        return new StatsEntity($data);
    }

    public function types()
    {
        $data  = $this->client->get('data/pet/types');

        return array_map(function ($type) {
            return new TypeEntity($type);
        }, $data['petTypes']);
    }
}
