<?php
namespace Pwnraid\Bnet\Warcraft\Zones;

use Pwnraid\Bnet\Core\AbstractRequest;

class ZoneRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('zone/');

        return array_map(function ($zone) {
            return new ZoneEntity($zone);
        }, $data['zones']);
    }

    public function find($id)
    {
        $data = $this->client->get('zone/'.$id);

        if ($data === null) {
            return null;
        }

        return new ZoneEntity($data);
    }
}
