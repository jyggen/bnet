<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
            return;
        }

        return new BossEntity($data);
    }
}
