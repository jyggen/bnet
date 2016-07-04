<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Quests;

use Pwnraid\Bnet\Core\AbstractRequest;

class QuestRequest extends AbstractRequest
{
    public function find($questId)
    {
        $data = $this->client->get('quest/'.$questId);

        if ($data === null) {
            return;
        }

        return new QuestEntity($data);
    }
}
