<?php

declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Boo\BattleNet\Apis\Warcraft;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class ItemApi extends AbstractApi
{
    public function getItem(int $itemId): RequestInterface
    {
        return $this->createRequest('GET', '/wow/item/'.$itemId);
    }

    public function getItemSet(string $setId): RequestInterface
    {
        return $this->createRequest('GET', '/wow/item/set/'.$setId);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [
            'CN',
            'SEA',
        ];
    }
}
