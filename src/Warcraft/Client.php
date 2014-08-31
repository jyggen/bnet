<?php
namespace Pwnraid\Bnet\Warcraft;

use Pwnraid\Bnet\Core\AbstractClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;
use Pwnraid\Bnet\Warcraft\Quests\QuestRequest;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;
use Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest;
use Pwnraid\Bnet\Warcraft\Spells\SpellRequest;

class Client extends AbstractClient
{
    const API = 'wow';

    public function battlePets()
    {
        return new BattlePetRequest($this);
    }

    public function characters()
    {
        return new CharacterRequest($this);
    }

    public function guilds()
    {
        return new GuildRequest($this);
    }

    public function items()
    {
        return new ItemRequest($this);
    }

    public function leaderboards()
    {
        return new LeaderboardRequest($this);
    }

    public function quests()
    {
        return new QuestRequest($this);
    }

    public function realms()
    {
        return new RealmRequest($this);
    }

    public function recipes()
    {
        return new RecipeRequest($this);
    }

    public function spells()
    {
        return new SpellRequest($this);
    }
}
