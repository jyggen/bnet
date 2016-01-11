## Battle.net API Client

[![Gitter Chat][badge-gitter]][gitter]
[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][release]
[![Software License][badge-license]][license]
[![Build Status][badge-build]][build]
[![Scrutinizer][badge-quality]][quality]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

pwnraid/bnet is a PHP 5.5+ library for working with the Battle.net Web APIs.

[Find Curl on Packagist/Composer](https://packagist.org/packages/pwnraid/bnet)

### API Documentation

The [latest class API documentation][apidocs] is available online.

### Road to 1.0

- [ ] Implement all available API endpoints (see below).
- [ ] Write some documentation.
- [ ] Clean up response entities.
- [ ] 100% test coverage.
- [x] Switch cache from [tedivm/stash](https://github.com/tedious/Stash) to [PSR-6](http://www.php-fig.org/psr/psr-6/) interfaces.
- [x] Stable release (>=1.0) of [thephpleague/oauth2-client](https://github.com/thephpleague/oauth2-client).

#### Implementation Status

##### Account API

- [x] /account/user/id
- [x] /account/user/battletag

##### D3 Community API

- [ ] /d3/profile/:battletag/
- [ ] /d3/profile/:battletag/hero/:id
- [x] /d3/data/item/:data
- [x] /d3/data/follower/:follower
- [x] /d3/data/artisan/:artisan

##### Community OAuth Profile APIs

- [ ] /account/user
- [ ] /sc2/profile/user
- [x] /wow/user/characters

##### SC2 Community APIs

- [ ] /sc2/profile/:id/:region/:name/
- [ ] /sc2/profile/:id/:region/:name/ladders
- [ ] /sc2/profile/:id/:region/:name/matches
- [ ] /sc2/ladder/:id
- [ ] /sc2/data/achievements
- [ ] /sc2/data/rewards

##### WoW Community APIs

- [x] /wow/achievement/:id
- [x] /wow/auction/data/:realm
- [ ] /wow/pet
- [x] /wow/pet/ability/:abilityid
- [x] /wow/pet/species/:speciesid
- [x] /wow/pet/stats/:speciesid
- [x] /wow/mount
- [x] /wow/challenge/:realm
- [x] /wow/challenge/region
- [x] /wow/character/:realm/:charactername
- [x] /wow/item/:itemid
- [x] /wow/item/set/:setid
- [x] /wow/guild/:realm/:guildname
- [x] /wow/leaderboard/:bracket
- [x] /wow/quest/:questid
- [x] /wow/realm/status
- [x] /wow/recipe/:recipeid
- [x] /wow/spell/:spellid
- [x] /wow/data/battlegroups
- [x] /wow/data/character/races
- [x] /wow/data/character/classes
- [x] /wow/data/character/achievements
- [x] /wow/data/guild/rewards
- [x] /wow/data/guild/perks
- [x] /wow/data/guild/achievements
- [x] /wow/data/item/classes
- [x] /wow/data/talents
- [x] /wow/data/pet/types
- [ ] /wow/zone/
- [ ] /wow/zone/:zoneid
- [ ] /wow/boss/
- [ ] /wow/boss/:bossid

##### Game Data APIs

- [ ] /data/d3/season
- [ ] /data/d3/season/:id
- [ ] /data/d3/season/:id/leaderboard/:leaderboard
- [ ] /data/d3/era
- [ ] /data/d3/era/:id
- [ ] /data/d3/era/:id/leaderboard/:leaderboard

### License

This library is licensed under the MIT license.

Battle.net, Warcraft, World of Warcraft, StarCraft and Diablo are copyrighted by Blizzard Entertainment, Inc.

This library is neither endorsed by nor associated with Blizzard Entertainment, Inc.

[apidocs]: https://docs.pwnraid.org/bnet/latest/

[badge-gitter]: https://img.shields.io/badge/gitter-join_chat-brightgreen.svg?style=flat-square
[badge-source]: https://img.shields.io/badge/source-pwnraid/bnet-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/packagist/v/pwnraid/bnet.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/pwnraid/bnet/master.svg?style=flat-square
[badge-quality]: https://img.shields.io/scrutinizer/g/pwnraid/bnet/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coveralls/pwnraid/bnet/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/pwnraid/bnet.svg?style=flat-square

[gitter]: https://gitter.im/pwnraid/bnet
[source]: https://github.com/pwnraid/bnet
[release]: https://packagist.org/packages/pwnraid/bnet
[license]: https://github.com/pwnraid/bnet/blob/master/LICENSE
[build]: https://travis-ci.org/pwnraid/bnet
[quality]: https://scrutinizer-ci.com/g/pwnraid/bnet/
[coverage]: https://coveralls.io/r/pwnraid/bnet?branch=master
[downloads]: https://packagist.org/packages/pwnraid/bnet
