<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Leaderboards;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utils;

class LeaderboardRequest extends AbstractRequest
{
    public function challengeMode($realm = null)
    {
        if ($realm !== null) {
            $data = $this->client->get('challenge/'.Utils::realmNameToSlug($realm));

            if ($data === null) {
                return;
            }

            return new ChallengeModeEntity($data);
        }

        $data = $this->client->get('challenge/region');

        return new ChallengeModeEntity($data);
    }

    public function pvp($bracket)
    {
        if (in_array($bracket, ['2v2', '3v3', '5v5', 'rbg'], true) === false) {
            throw new \RuntimeException('Invalid bracket type');
        }

        $data = $this->client->get('leaderboard/'.$bracket);

        return new BracketEntity($data);
    }
}
