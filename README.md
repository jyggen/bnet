## Battle.net API Client

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

### Implementation Status

This library is still under development. You can track implementation status of each endpoint below.

#### Account API

- [ ] /account/user/id
- [ ] /account/user/battletag

#### D3 Community API

- [ ] /d3/profile/:battletag/
- [ ] /d3/profile/:battletag/hero/:id
- [ ] /d3/data/item/:data
- [ ] /d3/data/follower/:follower
- [ ] /d3/data/artisan/:artisan

#### Community OAuth Profile APIs

- [ ] /sc2/profile/user
- [ ] /wow/user/characters

#### SC2 Community APIs

- [ ] /sc2/profile/:id/:region/:name/
- [ ] /sc2/profile/:id/:region/:name/ladders
- [ ] /sc2/profile/:id/:region/:name/matches
- [ ] /sc2/ladder/:id
- [ ] /sc2/data/achievements
- [ ] /sc2/data/rewards

#### WoW Community APIs

- [x] /wow/achievement/:id
- [ ] /wow/auction/data/:realm
- [x] /wow/battlepet/ability/:abilityid
- [x] /wow/battlepet/species/:speciesid
- [ ] /wow/battlepet/stats/:speciesid
- [ ] /wow/challenge/:realm
- [ ] /wow/challenge/region
- [x] /wow/character/:realm/:charactername
- [ ] /wow/item/:itemid
- [ ] /wow/item/set/:setid
- [ ] /wow/guild/:realm/:guildname
- [ ] /wow/leaderboard/:bracket
- [ ] /wow/quest/:questid
- [ ] /wow/realm/status
- [ ] /wow/recipe/:recipeid
- [ ] /wow/spell/:spellid
- [ ] /wow/data/battlegroups/
- [ ] /wow/data/character/races
- [ ] /wow/data/character/classes
- [ ] /wow/data/character/achievements
- [ ] /wow/data/guild/rewards
- [ ] /wow/data/guild/perks
- [ ] /wow/data/guild/achievements
- [ ] /wow/data/item/classes
- [ ] /wow/data/talents
- [ ] /wow/data/pet/types
