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

final class PetApi extends AbstractApi
{
    public function getMasterList(): RequestInterface
    {
        return $this->createRequest('GET', '/wow/pet/');
    }

    public function getAbilities(string $abilityID): RequestInterface
    {
        return $this->createRequest('GET', '/wow/pet/ability/'.$abilityID);
    }

    public function getSpecies(string $speciesID): RequestInterface
    {
        return $this->createRequest('GET', '/wow/pet/species/'.$speciesID);
    }

    public function getStats(string $speciesID, int $level, int $breedId, int $qualityId): RequestInterface
    {
        return $this->createRequest('GET', '/wow/pet/stats/'.$speciesID, [
            'level' => $level,
            'breedId' => $breedId,
            'qualityId' => $qualityId,
        ]);
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
