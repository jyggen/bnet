<?php
namespace Pwnraid\Bnet\Warcraft\Auctions;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Exceptions\BattleNetException;
use Pwnraid\Bnet\Utils;

class AuctionRequest extends AbstractRequest
{
    public function download(IndexEntity $index)
    {
        $data = $this->client->getRawUrl($index->url);

        if ($data === null) {
            return null;
        }

        $auctions = [];

        foreach ($data['auctions']['auctions'] as $auction) {
            $auctions[] = new AuctionEntity($auction);
        }

        return $auctions;
    }

    public function index($realm)
    {
        $data = $this->client->get('auction/data/'.Utils::realmNameToSlug($realm));

        if ($data === null) {
            return null;
        }

        return new IndexEntity($data['files'][0]);
    }
}
