<?php
namespace Pwnraid\Bnet\Warcraft\Bosses;

use Pwnraid\Bnet\Core\AbstractRequest;

class BossRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('boss/');

        return array_map(function ($boss) {
            return new BossEntity($boss);
        }, $data['bosses']);
    }

    public function find($id)
    {
        $data = $this->client->get('boss/'.$id);

        if ($data === null) {
            return null;
        }

        return new BossEntity($data);
    }
}
