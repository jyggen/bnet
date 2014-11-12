<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

use League\OAuth2\Client\Token\AccessToken;
use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utility;

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
        $data         = $this->client->get('data/character/achievements');
        $achievements = [];

        foreach ($data['achievements'] as $category) {
            $achievements[] = new AchievementCategoryEntity($category);
        }

        return $achievements;
    }

    public function classes()
    {
        $data    = $this->client->get('data/character/classes');
        $classes = [];

        foreach ($data['classes'] as $class) {
            $classes[] = new ClassEntity($class);
        }

        return $classes;
    }

    public function find($name, array $fields = [])
    {
        if ($this->realm === null) {
            throw new \RuntimeException('You must set a realm name with on() before calling find()');
        }

        $data = $this->client->get('character/'.$this->realm.'/'.$name, ['query' => ['fields' => implode(',', $fields)]]);

        if ($data === null or count($data) === 0) {
            return null;
        }

        return new CharacterEntity($data);
    }

    public function on($realm)
    {
        $this->realm = Utility::realmNameToSlug($realm);
        return $this;
    }

    public function races()
    {
        $data  = $this->client->get('data/character/races');
        $races = [];

        foreach ($data['races'] as $race) {
            $races[] = new RaceEntity($race);
        }

        return $races;
    }

    public function talents()
    {
        $data    = $this->client->get('data/talents');
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
        $data       = $this->client->get('user/characters', ['query' => ['access_token' =>$token]]);
        $characters = [];

        foreach ($data['characters'] as $character) {
            $characters[] = new CharacterEntity($character);
        }

        return $characters;
    }
}
