<?php
namespace Pwnraid\Bnet\Warcraft;

use Pwnraid\Bnet\Core\AbstractClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;

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

    public function items()
    {
        return new ItemRequest($this);
    }

    public function leaderboards()
    {
        return new LeaderboardRequest($this);
    }
}
