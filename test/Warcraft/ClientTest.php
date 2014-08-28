<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Mockery;
use Pwnraid\Bnet\Warcraft\Client;

class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testBattlePets()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest', $client->battlePets());
    }

    public function testCharacters()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Characters\CharacterRequest', $client->characters());
    }

    public function testGuilds()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Guilds\GuildRequest', $client->guilds());
    }

    public function testItems()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Items\ItemRequest', $client->items());
    }

    public function testLeaderboards()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest', $client->leaderboards());
    }

    public function testQuests()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Quests\QuestRequest', $client->quests());
    }

    public function testRecipes()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest', $client->recipes());
    }

    public function testSpells()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Spells\SpellRequest', $client->spells());
    }
}
