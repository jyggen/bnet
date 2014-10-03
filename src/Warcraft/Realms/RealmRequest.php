<?php
namespace Pwnraid\Bnet\Warcraft\Realms;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utility;

class RealmRequest extends AbstractRequest
{
    public function battlegroups()
    {
        $data = $this->client->get('data/battlegroups/');

        return new BattlegroupEntity($data); // @todo: Return array of objects.
    }

    public function find($realms)
    {
        $returnSingle = false;

        if (is_array($realms) === false) {
            $realms       = [$realms];
            $returnSingle = true;
        }

        foreach ($realms as &$realm) {
            $realm = Utility::realmNameToSlug($realm);
        }

        $data       = $this->client->get('realm/status', ['query' => ['realms' => implode(',', $realms)]]);
        $realmCount = count($data['realms']);

        if ($returnSingle && $realmCount !== 1) {
            return null;
        }

        if ($realmCount !== count($realms)) {
            throw new \RuntimeException('Unable to fetch all requested realms');
        }

        $realms = $this->createRealmEntities($data['realms']);

        return ($returnSingle) ? $realms[0] : $realms;
    }

    public function all()
    {
        $data = $this->client->get('realm/status');

        return $this->createRealmEntities($data['realms']);
    }

    protected function createRealmEntities(array $realmsList)
    {
        $realms = [];

        foreach ($realmsList as $realm) {
            $realms[] = new RealmEntity($realm);
        }

        return $realms;
    }
}
