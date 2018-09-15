<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet\Apis\Diablo;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

final class ActApi extends AbstractApi
{
    public function getActIndex(): RequestInterface
    {
        return $this->createRequest('GET', '/d3/data/act');
    }

    public function getAct(int $actId): RequestInterface
    {
        return $this->createRequest('GET', '/d3/data/act/'.$actId);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [
            'SEA',
        ];
    }
}
