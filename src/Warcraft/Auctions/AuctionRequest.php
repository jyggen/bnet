<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Auctions;

use Pwnraid\Bnet\Core\AbstractRequest;
use Pwnraid\Bnet\Utils;

class AuctionRequest extends AbstractRequest
{
    public function download(IndexEntity $index)
    {
        $data = $this->client->getRawUrl($index->url);

        if ($data === null) {
            return;
        }

        $auctions = [];

        foreach ($data['auctions'] as $auction) {
            $auctions[] = new AuctionEntity($auction);
        }

        return $auctions;
    }

    public function index($realm)
    {
        $data = $this->client->get('auction/data/'.Utils::realmNameToSlug($realm));

        if ($data === null) {
            return;
        }

        return new IndexEntity($data['files'][0]);
    }
}
