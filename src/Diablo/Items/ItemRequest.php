<?php
namespace Pwnraid\Bnet\Diablo\Items;

use Pwnraid\Bnet\Core\AbstractRequest;

class ItemRequest extends AbstractRequest
{
    public function find($data)
    {
        $data = $this->client->get('data/item/'.$data);

        if ($data === null) {
            return null;
        }

        return new ItemEntity($data);
    }
}
