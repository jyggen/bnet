<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Spells;

use Pwnraid\Bnet\Core\AbstractRequest;

class SpellRequest extends AbstractRequest
{
    public function find($spellId)
    {
        $data = $this->client->get('spell/'.$spellId);

        if ($data === null) {
            return;
        }

        return new SpellEntity($data);
    }
}
