<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 19/06/2016
 * Time: 14.13
 */

namespace Pwnraid\Bnet\Warcraft\Zones;

use Pwnraid\Bnet\Core\AbstractRequest;

class ZoneRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('zone/');

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($zone) {
            return new ZoneEntity($zone);
        }, $data['zones']);
    }

    public function find($id)
    {
        $data = $this->client->get("zone/{$id}");

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new ZoneEntity($data);
    }
}
