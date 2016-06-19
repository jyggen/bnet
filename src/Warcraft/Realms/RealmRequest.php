<?php
namespace Pwnraid\Bnet\Warcraft\Realms;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utils;

class RealmRequest extends AbstractRequest
{
    /**
     * @return BattlegroupEntity
     */
    public function battlegroups()
    {
        $data = $this->client->get('data/battlegroups/');

        if (is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return array_map(function($battlegroup) {
            return new BattlegroupEntity($battlegroup);
        }, $data['battlegroups']);
    }

    /**
     * @param array|string $realms
     *
     * @return RealmEntity|array|null
     */
    public function find($realms)
    {
        $returnSingle = false;

        if (! is_array($realms)) {
            $realms       = [$realms];
            $returnSingle = true;
        }

        $realms = array_filter($realms, function(&$realm) {
            return Utils::realmNameToSlug($realm);
        });

        $data       = $this->client->get('realm/status', ['query' => ['realms' => implode(',', $realms)]]);

        if (is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

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

    /**
     * @return array
     */
    public function all()
    {
        $data = $this->client->get('realm/status');

        if (is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return $this->createRealmEntities($data['realms']);
    }

    /**
     * @param array $realmsList
     *
     * @return array
     */
    protected function createRealmEntities(array $realmsList)
    {
        return array_map(function($realm) {
            return new RealmEntity($realm);
        }, $realmsList);
    }
}
