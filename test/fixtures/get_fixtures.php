<?php
require_once __DIR__.'/../../phpunit.php';

use Pwnraid\Bnet\Test\FixtureClient;
use Pwnraid\Bnet\Diablo\Artisans\ArtisanRequest;
use Pwnraid\Bnet\Diablo\Followers\FollowerRequest;
use Pwnraid\Bnet\Diablo\Items\ItemRequest as D3ItemRequest;
use Pwnraid\Bnet\Warcraft\Auctions\AuctionRequest;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest as WowItemRequest;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;
use Pwnraid\Bnet\Warcraft\Mounts\MountsRequest;
use Pwnraid\Bnet\Warcraft\Quests\QuestRequest;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;
use Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest;
use Pwnraid\Bnet\Warcraft\Spells\SpellRequest;

if (isset($argv[1]) === false) {
    exit("You must supply an api key, run the file like this:\n> php get_fixtures.php bnet-api-key-here\n");
}

$d3Client  = new FixtureClient($argv[1], 'd3');
$wowClient = new FixtureClient($argv[1], 'wow');

// Call all the endpoints we need fixtures/dummy data for in our tests.
(new ArtisanRequest($d3Client))->find('mystic');
$auction = (new AuctionRequest($wowClient))->index('Auchindoun');
(new AuctionRequest($wowClient))->download($auction);
(new BattlePetRequest($wowClient))->ability(640);
(new BattlePetRequest($wowClient))->species(258);
(new BattlePetRequest($wowClient))->stats(258);
(new BattlePetRequest($wowClient))->stats(258, 25, 5, 4);
(new BattlePetRequest($wowClient))->types();
(new D3ItemRequest($d3Client))->find('VoodooMask_206');
(new CharacterRequest($wowClient))->achievement(2144);
(new CharacterRequest($wowClient))->achievements();
(new CharacterRequest($wowClient))->classes();
(new CharacterRequest($wowClient))->on('Frostwhisper')->find('Morloderex', ['mounts', 'titles']);
(new CharacterRequest($wowClient))->on('Argent Dawn')->find('Picaboo');
(new CharacterRequest($wowClient))->races();
(new CharacterRequest($wowClient))->talents();
(new FollowerRequest($d3Client))->find('templar');
(new GuildRequest($wowClient))->achievements();
(new GuildRequest($wowClient))->on('Argent Dawn')->find('Blinkspeed Couriers');
(new GuildRequest($wowClient))->on('Auchindoun')->find('Dyslectic Defnenders', ['news', 'members']);
(new GuildRequest($wowClient))->perks();
(new GuildRequest($wowClient))->rewards();
(new LeaderboardRequest($wowClient))->challengeMode();
(new LeaderboardRequest($wowClient))->challengeMode('Argent Dawn');
(new LeaderboardRequest($wowClient))->pvp('2v2');
(new QuestRequest($wowClient))->find(13146);
(new RealmRequest($wowClient))->all();
(new RealmRequest($wowClient))->find('Argent Dawn');
(new RealmRequest($wowClient))->find(['Argent Dawn', 'Auchindoun']);
try { // Workaround for error handler.
    (new RealmRequest($wowClient))->find(['Argant Dewn', 'Auchindoun']);
} catch (\RuntimeException $e) {
}
(new RealmRequest($wowClient))->battlegroups();
(new RecipeRequest($wowClient))->find(33994);
(new SpellRequest($wowClient))->find(8056);
(new WowItemRequest($wowClient))->classes();
(new WowItemRequest($wowClient))->find(18803);
(new WowItemRequest($wowClient))->findSet(1060);
(new WowItemRequest($wowClient))->find(110050);
(new WowItemRequest($wowClient))->withContext('dungeon-level-up-1')->find(110050);
(new WowItemRequest($wowClient))->withContext('dungeon-level-up-1')->find(110050, [40, 41]);
