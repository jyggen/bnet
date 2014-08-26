<?php
namespace Pwnraid\Bnet\Diablo\Followers;

use Pwnraid\Bnet\Core\AbstractRequest;

class FollowerRequest extends AbstractRequest
{
    public function get($follower)
    {
        $data = $this->client->get('data/follower/'.$follower);

        if ($data === null) {
            return null;
        }

        return new ItemEntity($data);
    }
}
