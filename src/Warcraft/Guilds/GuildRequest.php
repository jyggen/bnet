<?php
namespace Pwnraid\Bnet\Warcraft\Guilds;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utils;

class GuildRequest extends AbstractRequest
{
    protected $realm;

    public function achievements()
    {
        $data = $this->client->get('data/guild/achievements');

        if(is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new AchievementEntity($data);
    }

    public function find($name, array $fields = [])
    {
        if ($this->realm === null) {
            throw new \RuntimeException('You must set a realm name with on() before calling find()');
        }

        $data = $this->client->get('guild/'.$this->realm.'/'.$name, ['query' => ['fields' => implode(',', $fields)]]);

        if ($data === null) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new GuildEntity($data);
    }

    public function on($realm)
    {
        $this->realm = Utils::realmNameToSlug($realm);
        return $this;
    }

    public function getCurrentRealm()
    {
        return $this->realm;
    }

    public function perks()
    {
        $data = $this->client->get('data/guild/perks');

        if(is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new PerkEntity($data);
    }

    public function rewards()
    {
        $data = $this->client->get('data/guild/rewards');

        if(is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new RewardEntity($data);
    }
}
