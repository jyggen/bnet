<?php
namespace Pwnraid\Bnet\Warcraft\Leaderboards;

use Pwnraid\Bnet\Core\AbstractRequest;

class LeaderboardRequest extends AbstractRequest
{
    public function challengeMode($realm = null)
    {
        if ($realm !== null) {
            $data = $this->client->get('challenge/'.$realm);

            if ($data === null) {
                return null;
            }

            return new ChallengeModeEntity($data);
        }

        $data = $this->client->get('challenge/region');

        if ($data === null) {
            return null;
        }

        return new ChallengeModeEntity($data);
    }

    public function pvp($bracket)
    {
        $data = $this->client->get('challenge/region/'.$bracket); // @todo: validate 2v2, 3v3, 5v5 and rbg.

        if ($data === null) {
            return null;
        }

        return new BracketEntity($data);
    }
}
