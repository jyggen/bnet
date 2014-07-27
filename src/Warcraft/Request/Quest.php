<?php
namespace Pwnraid\Bnet\Warcraft\Request;

use Pwnraid\Bnet\BaseRequest;
use Pwnraid\Bnet\Warcraft\Entity\Quest as QuestEntity;

class Quest extends BaseRequest
{
    public function find($id)
    {
        $data = $this->client->get('quest/'.$id);

        if ($data === null) {
            return null;
        }

        return new QuestEntity($data);
    }
}
