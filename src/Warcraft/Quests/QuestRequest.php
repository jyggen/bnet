<?php
namespace Pwnraid\Bnet\Warcraft\Quests;

use Pwnraid\Bnet\Core\AbstractRequest;

class QuestRequest extends AbstractRequest
{
    public function find($questId)
    {
        $data = $this->client->get('quest/'.$questId);

        if ($data === null) {
            return null;
        }

        return new QuestEntity($data);
    }
}
