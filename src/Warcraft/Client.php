<?php
namespace Pwnraid\Bnet\Warcraft;

use Pwnraid\Bnet\Core\AbstractClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;
use Pwnraid\Bnet\Warcraft\Request\Quest;

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

    public function quests()
    {
        return new Quest($this);
    }
}
