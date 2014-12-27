<?php
namespace Pwnraid\Bnet\Warcraft\Auctions;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Exceptions\BattleNetException;
use Pwnraid\Bnet\Utility;

class AuctionRequest extends AbstractRequest
{
    public function download(IndexEntity $index)
    {
        $data = file_get_contents($index->url);

        if ($data === false) {
            throw new BattleNetException('Unable to download auction dump from "'.$index->url.'"');
        }

        $json     = json_decode($data, true);
        $auctions = [];

        if (is_array($json) === false) {
            throw new BattleNetException('Invalid json returned in auction dump from "'.$index->url.'"');
        }

        foreach ($json['auctions']['auctions'] as $auction) {
            $auctions[] = new AuctionEntity($auction);
        }

        return $auctions;
    }

    public function index($realm)
    {
        $data = $this->client->get('auction/data/'.Utility::realmNameToSlug($realm));

        if ($data === null) {
            return null;
        }

        return new IndexEntity($data['files'][0]);
    }
}
