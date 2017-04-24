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

final class SpellApi
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
     * @param int $spellId
     *
     * @return RequestInterface
     */
    public function getSpell(int $spellId): RequestInterface
    {
        return $this->factory->make(
            RequestMethodInterface::METHOD_GET,
            sprintf('wow/spell/%u', $spellId)
        );
    }
}
