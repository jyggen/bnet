<?php
require_once '../Bootstrap.php';

use Pwnraid\Bnet\Test\FixtureClient;
use Pwnraid\Bnet\Warcraft\BattlePets\BattlePetRequest;
use Pwnraid\Bnet\Warcraft\Characters\CharacterRequest;
use Pwnraid\Bnet\Warcraft\Guilds\GuildRequest;
use Pwnraid\Bnet\Warcraft\Items\ItemRequest;
use Pwnraid\Bnet\Warcraft\Leaderboards\LeaderboardRequest;
use Pwnraid\Bnet\Warcraft\Quests\QuestRequest;
use Pwnraid\Bnet\Warcraft\Realms\RealmRequest;
use Pwnraid\Bnet\Warcraft\Recipes\RecipeRequest;
use Pwnraid\Bnet\Warcraft\Spells\SpellRequest;

if (isset($argv[1]) === false) {
    exit("You must supply an api key, run the file like this:\n> php get_fixtures.php bnet-api-key-here\n");
}

$wowClient = new FixtureClient($argv[1], 'wow');

// Call all the endpoints we need fixtures/dummy data for in our tests.
(new BattlePetRequest($wowClient))->ability(640);
(new BattlePetRequest($wowClient))->species(258);
(new BattlePetRequest($wowClient))->stats(258);
(new BattlePetRequest($wowClient))->stats(258, 25, 5, 4);
(new BattlePetRequest($wowClient))->types();
(new CharacterRequest($wowClient))->achievement(2144);
(new CharacterRequest($wowClient))->achievements();
(new CharacterRequest($wowClient))->classes();
(new CharacterRequest($wowClient))->on('Auchindoun')->find('Jyggen', ['mounts', 'titles']);
(new CharacterRequest($wowClient))->on('Argent Dawn')->find('Picaboo');
(new CharacterRequest($wowClient))->races();
(new CharacterRequest($wowClient))->talents();
(new GuildRequest($wowClient))->achievements();
(new GuildRequest($wowClient))->on('Argent Dawn')->find('Blinkspeed Couriers');
(new GuildRequest($wowClient))->on('Auchindoun')->find('Dyslectic Defnenders');
(new GuildRequest($wowClient))->perks();
(new GuildRequest($wowClient))->rewards();
(new ItemRequest($wowClient))->classes();
(new ItemRequest($wowClient))->find(18803);
(new ItemRequest($wowClient))->findSet(1060);
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
