<?php
namespace Pwnraid\Bnet\Warcraft\Quests;

use Pwnraid\Bnet\Core\AbstractRequest;

class QuestRequest extends AbstractRequest
{
    public function find($questId)
    {
        $data = $this->client->get('quest/'.$questId);

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new QuestEntity($data);
    }
}
