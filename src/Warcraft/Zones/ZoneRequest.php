<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Zones;

use Pwnraid\Bnet\Core\AbstractRequest;

class ZoneRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('zone/');

        return array_map(function ($zone) {
            return new ZoneEntity($zone);
        }, $data['zones']);
    }

    public function find($id)
    {
        $data = $this->client->get('zone/'.$id);

        if ($data === null) {
            return;
        }

        return new ZoneEntity($data);
    }
}
