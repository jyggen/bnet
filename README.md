# Battle.net API Client

[![Latest Version](https://img.shields.io/github/release/pwnraid/bnet.svg?style=flat-square)](https://github.com/pwnraid/bnet/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/pwnraid/bnet/master.svg?style=flat-square)](https://travis-ci.org/pwnraid/bnet)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/pwnraid/bnet.svg?style=flat-square)](https://scrutinizer-ci.com/g/pwnraid/bnet/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/pwnraid/bnet.svg?style=flat-square)](https://scrutinizer-ci.com/g/pwnraid/bnet)
[![Total Downloads](https://img.shields.io/packagist/dt/pwnraid/bnet.svg?style=flat-square)](https://packagist.org/packages/pwnraid/bnet)

A library to work with the Battle.net Web APIs. This package is compliant with [PSR-1], [PSR-2] and [PSR-4].

[Find Battle.net API Client on Packagist/Composer](https://packagist.org/packages/pwnraid/bnet)

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md

## Road to 1.0

- [ ] Implement all available API endpoints (see below).
- [ ] Clean up response entities.
- [ ] 100% test coverage.
- [ ] Switch cache from [tedivm/stash](https://github.com/tedious/Stash) to [PSR-6](https://github.com/php-fig/fig-standards/blob/master/proposed/cache.md) interfaces.
- [ ] Stable release (>=1.0) of [thephpleague/oauth2-client](https://github.com/thephpleague/oauth2-client).

### Implementation Status

#### Account API

- [x] /account/user/id
- [x] /account/user/battletag

#### D3 Community API

- [ ] /d3/profile/:battletag/
- [ ] /d3/profile/:battletag/hero/:id
- [x] /d3/data/item/:data
- [x] /d3/data/follower/:follower
- [x] /d3/data/artisan/:artisan

#### Community OAuth Profile APIs

- [ ] /sc2/profile/user
- [x] /wow/user/characters

#### SC2 Community APIs

- [ ] /sc2/profile/:id/:region/:name/
- [ ] /sc2/profile/:id/:region/:name/ladders
- [ ] /sc2/profile/:id/:region/:name/matches
- [ ] /sc2/ladder/:id
- [ ] /sc2/data/achievements
- [ ] /sc2/data/rewards

#### WoW Community APIs

- [x] /wow/achievement/:id
- [x] /wow/auction/data/:realm
- [x] /wow/battlepet/ability/:abilityid
- [x] /wow/battlepet/species/:speciesid
- [x] /wow/battlepet/stats/:speciesid
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
- [x] /wow/data/battlegroups/
- [x] /wow/data/character/races
- [x] /wow/data/character/classes
- [x] /wow/data/character/achievements
- [x] /wow/data/guild/rewards
- [x] /wow/data/guild/perks
- [x] /wow/data/guild/achievements
- [x] /wow/data/item/classes
- [x] /wow/data/talents
- [x] /wow/data/pet/types

## License

The MIT License (MIT). Please see [License File](https://github.com/pwnraid/bnet/blob/master/LICENSE) for more information.

Battle.net, Warcraft, World of Warcraft, StarCraft and Diablo are copyrighted by Blizzard Entertainment, Inc.

This library is neither endorsed by nor associated with Blizzard Entertainment, Inc.
