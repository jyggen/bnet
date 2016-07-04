<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

use League\OAuth2\Client\Token\AccessToken;
use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utils;

class CharacterRequest extends AbstractRequest
{
    protected $realm;

    public function achievement($achievementId)
    {
        $data = $this->client->get('achievement/'.$achievementId);

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new AchievementEntity($data);
    }

    /**
     * @return array
     */
    public function achievements()
    {
        $data         = $this->client->get('data/character/achievements');

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($achievement) {
            return new AchievementCategoryEntity($achievement);
        }, $data['achievements']);
    }

    public function classes()
    {
        $data    = $this->client->get('data/character/classes');

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($class) {
            return new ClassEntity($class);
        }, $data['classes']);
    }

    public function find($name, array $fields = [])
    {
        if ($this->realm === null) {
            throw new \RuntimeException('You must set a realm name with on() before calling find()');
        }

        $data = $this->client->get('character/'.$this->realm.'/'.$name, [
            'query' => [
                'fields' => implode(',', $fields),
            ],
        ]);

        if (is_null($data) || count($data) === 0) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return new CharacterEntity($data);
    }

    public function on($realm)
    {
        $this->realm = Utils::realmNameToSlug($realm);
        return $this;
    }

    public function races()
    {
        $data  = $this->client->get('data/character/races');

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        return array_map(function ($race) {
             return new RaceEntity($race);
        }, $data['races']);
    }

    public function talents()
    {
        $data    = $this->client->get('data/talents');

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        $classes = [];

        foreach ($data as $classId => $class) {
            $classes[$classId] = [
                'glyphs'  => [],
                'talents' => [],
            ];

            foreach ($class['glyphs'] as $glyph) {
                $classes[$classId]['glyphs'][] = new GlyphEntity($glyph);
            }

            foreach ($class['talents'] as $talent) {
                $classes[$classId]['talents'][] = new TalentEntity($talent);
            }
        }

        return $classes;
    }

    public function user(AccessToken $token)
    {
        $data       = $this->client->get('user/characters', ['query' => ['access_token' => $token]]);

        if (is_null($data)) {
            return null;
        }

        if ($this->asJson) {
            return json_encode($data);
        }

        $characters = [];

        foreach ($data['characters'] as $character) {
            $characters[] = new CharacterEntity($character);
        }

        return $characters;
    }

    public function currentRealm()
    {
        return $this->realm;
    }
}
