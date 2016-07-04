<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 19/06/2016
 * Time: 17.19
 */

namespace Pwnraid\Bnet\Warcraft\Boss;

use Pwnraid\Bnet\Core\AbstractRequest;

class BossRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('boss');

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($boss) {
            return new BossEntity($boss);
        }, $data['bosses']);
    }

    public function find($id)
    {
        $data = $this->client->get("boss/{$id}");

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new BossEntity($data);
    }
}
