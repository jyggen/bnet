<?php
namespace Pwnraid\Bnet\Warcraft\Realms;

use Pwnraid\Bnet\Core\AbstractRequest;

class RealmRequest extends AbstractRequest
{
    public function battlegroups()
    {
        $data = $this->client->get('data/battlegroups/');

        if ($data === null) {
            return null;
        }

        return new BattlegroupEntity($data);
    }

    public function find($realm)
    {
        if (is_array($realm) === false) {
            $realm = [$realm];
        }

        $data = $this->client->get('realm/status', ['query' => ['realms' => implode(',', $realm)]]);

        if ($data === null) {
            return null;
        }

        return new RealmEntity($data);
    }

    public function all()
    {
        $data = $this->client->get('realm/status');

        if ($data === null) {
            return null;
        }

        return new RealmEntity($data);
    }
}
