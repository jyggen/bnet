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

use Boo\BattleNet\Regions\RegionInterface;
use Boo\BattleNet\RequestFactoryInterface;
use Fig\Http\Message\RequestMethodInterface;
use Psr\Http\Message\RequestInterface;

final class PetApi
{
    /**
     * @var RequestFactoryInterface
     */
    private $factory;

    /**
     * @param RequestFactoryInterface $factory
     */
    public function __construct(RequestFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return RequestInterface
     */
    public function getMasterList(): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            'wow/pet/'
        );
    }

    /**
     * @param int $abilityId
     *
     * @return RequestInterface
     */
    public function getAbilities(int $abilityId): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/pet/ability/%u', $abilityId)
        );
    }

    /**
     * @param int $speciesId
     *
     * @return RequestInterface
     */
    public function getSpecies(int $speciesId): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/pet/species/%u', $speciesId)
        );
    }

    /**
     * @param int $speciesId
     * @param int $level
     * @param int $breedId
     * @param int $qualityId
     *
     * @return RequestInterface
     */
    public function getStats(int $speciesId, int $level = 1, int $breedId = 3, int $qualityId = 1): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/pet/species/%u', $speciesId),
            [
                'breedId' => $breedId,
                'level' => $level,
                'qualityId' => $qualityId,
            ]
        );
    }
}
