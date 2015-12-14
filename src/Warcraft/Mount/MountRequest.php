<?php

namespace Pwnraid\Bnet\Warcraft\Mount;


use Pwnraid\Bnet\Core\AbstractRequest;

class MountRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('mount/');

        if (is_null($data)) {
            return null;
        }

        $mounts = [];

        foreach ($data['mounts'] as $mount) {
            $mounts[] = new MountEntity($mount);
        }

        return $mounts;

    }
}