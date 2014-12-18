<?php
namespace Pwnraid\Bnet\Test\Warcraft;

use Mockery;

/**
 * @coversDefaultClass \Pwnraid\Bnet\Warcraft\Client
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::auctions
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testAuctions()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Auctions\AuctionRequest', $client->auctions());
    }

    /**
     * @covers ::__construct
     * @covers ::battlePets
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testBattlePets()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest', $client->battlePets());
    }

    /**
     * @covers ::__construct
     * @covers ::characters
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testCharacters()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Characters\CharacterRequest', $client->characters());
    }

    /**
     * @covers ::__construct
     * @covers ::guilds
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testGuilds()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Guilds\GuildRequest', $client->guilds());
    }

    /**
     * @covers ::__construct
     * @covers ::items
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testItems()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Items\ItemRequest', $client->items());
    }

    /**
     * @covers ::__construct
     * @covers ::leaderboards
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testLeaderboards()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest', $client->leaderboards());
    }

    /**
     * @covers ::__construct
     * @covers ::quests
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testQuests()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Quests\QuestRequest', $client->quests());
    }

    /**
     * @covers ::__construct
     * @covers ::realms
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testRealms()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Realms\RealmRequest', $client->realms());
    }

    /**
     * @covers ::__construct
     * @covers ::recipes
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testRecipes()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest', $client->recipes());
    }

    /**
     * @covers ::__construct
     * @covers ::spells
     * @uses   \Pwnraid\Bnet\Core\AbstractRequest
     */
    public function testSpells()
    {
        $client = (new Mockery)->mock('Pwnraid\Bnet\Warcraft\Client')->shouldDeferMissing();
        $this->assertInstanceOf('Pwnraid\Bnet\Warcraft\Spells\SpellRequest', $client->spells());
    }
}
