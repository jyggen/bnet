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

final class CharacterClassAndSkillApi extends AbstractApi
{
    public function getCharacterClass(string $classSlug): RequestInterface
    {
        return $this->createRequest('GET', '/d3/data/hero/'.$classSlug);
    }

    public function getApiSkill(string $classSlug, string $skillSlug): RequestInterface
    {
        return $this->createRequest('GET', '/d3/data/hero/'.$classSlug.'/skill/'.$skillSlug);
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
