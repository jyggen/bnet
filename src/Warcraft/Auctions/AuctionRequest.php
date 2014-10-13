<?php
namespace Pwnraid\Bnet\Warcraft\Auctions;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utility;

class AuctionRequest extends AbstractRequest
{
    public function download(IndexEntity $index)
    {
        $data     = json_decode(file_get_contents($index->url), true);
        $auctions = [];

        foreach ($data['alliance']['auctions'] as $auction) {
            $auctions['alliance'][] = new AuctionEntity($auction);
        }

        foreach ($data['horde']['auctions'] as $auction) {
            $auctions['horde'][] = new AuctionEntity($auction);
        }

        foreach ($data['neutral']['auctions'] as $auction) {
            $auctions['neutral'][] = new AuctionEntity($auction);
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
