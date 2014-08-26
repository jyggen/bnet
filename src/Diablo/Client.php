<?php
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
