<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Mounts;

use Pwnraid\Bnet\Core\AbstractRequest;

class MountRequest extends AbstractRequest
{
    public function all()
    {
        $data = $this->client->get('mount/');

        return array_map(function ($mount) {
            return new MountEntity($mount);
        }, $data['mounts']);
    }
}
