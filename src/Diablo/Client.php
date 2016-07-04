<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Diablo;

use Pwnraid\Bnet\Core\AbstractClient;
use Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest;
use Pwnraid\Bnet\Diablo\Followers\FollowerRequest;
use Pwnraid\Bnet\Diablo\Items\ItemRequest;

class Client extends AbstractClient
{
    const API = 'd3';

    public function artisans()
    {
        return new ArtisanRequest($this);
    }

    public function followers()
    {
        return new FollowerRequest($this);
    }

    public function items()
    {
        return new ItemRequest($this);
    }
}
