<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

        if ($data === null) {
            return;
        }

        return new AchievementEntity($data);
    }

    /**
     * @return array
     */
    public function achievements()
    {
        $data = $this->client->get('data/character/achievements');

        return array_map(function ($achievement) {
            return new AchievementCategoryEntity($achievement);
        }, $data['achievements']);
    }

    public function classes()
    {
        $data = $this->client->get('data/character/classes');

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

        if ($data === null || count($data) === 0) {
            return;
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
        $data = $this->client->get('data/character/races');

        return array_map(function ($race) {
             return new RaceEntity($race);
        }, $data['races']);
    }

    public function talents()
    {
        $data = $this->client->get('data/talents');
        $classes = [];

        foreach ($data as $classId => $class) {
            $classes[$classId] = [
                'glyphs' => [],
                'talents' => [],
            ];

            foreach ($class['talents'] as $talent) {
                $classes[$classId]['talents'][] = new TalentEntity($talent);
            }
        }

        return $classes;
    }

    public function user(AccessToken $token)
    {
        $data = $this->client->get('user/characters', ['query' => ['access_token' => $token]]);
        $characters = [];

        foreach ($data['characters'] as $character) {
            $characters[] = new CharacterEntity($character);
        }

        return $characters;
    }
}
