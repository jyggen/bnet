<?php
namespace Pwnraid\Bnet\Warcraft\Mounts;

use Pwnraid\Bnet\Core\AbstractRequest;

class MountRequest extends AbstractRequest
{
    public function all()
    {
        $data   = $this->client->get('mount/');
        $mounts = [];

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($mount) {
            return new MountEntity($mount);
        }, $data['mounts']);
    }
}
