<?php
namespace Pwnraid\Bnet\Warcraft\Leaderboards;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utils;

class LeaderboardRequest extends AbstractRequest
{
    public function challengeMode($realm = null)
    {
        if (! is_null($realm)) {
            $data = $this->client->get('challenge/'.Utils::realmNameToSlug($realm));

            if (is_null($data)) {
                return null;
            }

            if($this->asJson) {
                return json_encode($data);
            }

            return new ChallengeModeEntity($data);
        }

        $data = $this->client->get('challenge/region');

        if (is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new ChallengeModeEntity($data);
    }

    public function pvp($bracket)
    {
        if (! in_array($bracket, ['2v2', '3v3', '5v5', 'rbg'])) {
            throw new \RuntimeException('Invalid bracket type');
        }

        $data = $this->client->get('leaderboard/'.$bracket);

        if (is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new BracketEntity($data);
    }
}
