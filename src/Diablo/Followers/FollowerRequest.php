<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Diablo\Followers;

use Pwnraid\Bnet\Core\AbstractRequest;

class FollowerRequest extends AbstractRequest
{
    public function find($follower)
    {
        $data = $this->client->get('data/follower/'.$follower);

        if ($data === null) {
            return;
        }

        return new FollowerEntity($data);
    }
}
