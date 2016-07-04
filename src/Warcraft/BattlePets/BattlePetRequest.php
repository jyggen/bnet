<?php
namespace Pwnraid\Bnet\Warcraft\BattlePets;

use Pwnraid\Bnet\Core\AbstractRequest;

class BattlePetRequest extends AbstractRequest
{
    public function ability($abilityId)
    {
        $data = $this->client->get('pet/ability/'.$abilityId);

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new AbilityEntity($data);
    }

    public function specie($speciesId)
    {
        $data = $this->client->get('pet/species/'.$speciesId);

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
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

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new StatsEntity($data);
    }

    public function types()
    {
        $data  = $this->client->get('data/pet/types');

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($type) {
            return new TypeEntity($type);
        }, $data['petTypes']);
    }
}
