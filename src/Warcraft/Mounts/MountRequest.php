<?php

namespace Pwnraid\Bnet\Warcraft\Mounts;

use Pwnraid\Bnet\Core\AbstractRequest;

class MountRequest extends AbstractRequest
{

    public function all()
    {
        $data = $this->client->get('mount/');

        if ($data === null) {
            return;
        }

        $mounts = [];

        foreach ($data['mounts'] as $mount) {
            $mounts[] = new MountEntity($mount);
        }

        return $mounts;
    }
}
