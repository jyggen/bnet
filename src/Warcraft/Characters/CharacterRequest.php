<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

use Pwnraid\Bnet\Core\AbstractRequest;

class CharacterRequest extends AbstractRequest
{
    protected $realm;

    public function achievement($achievementId)
    {
        $data = $this->client->get('achievement/'.$achievementId);

        if ($data === null) {
            return null;
        }

        return new AchievementEntity($data);
    }

    public function achievements()
    {
        $data = $this->client->get('data/character/achievements');

        return new AchievementEntity($data);
    }

    public function classes()
    {
        $data = $this->client->get('data/character/classes');

        return new ClassEntity($data);
    }

    public function find($name, array $fields = [])
    {
        if ($this->realm === null) {
            throw new \RuntimeException('You must set a realm name with on() before calling find()');
        }

        $data = $this->client->get('character/'.$this->realm.'/'.$name, ['query' => ['fields' => implode(',', $fields)]]);

        if ($data === null) {
            return null;
        }

        return new CharacterEntity($data);
    }

    public function on($realm)
    {
        $this->realm = $realm;
        return $this;
    }

    public function races()
    {
        $data = $this->client->get('data/character/races');

        return new RaceEntity($data);
    }

    public function talents()
    {
        $data = $this->client->get('data/talents');

        return new TalentEntity($data);
    }
}
