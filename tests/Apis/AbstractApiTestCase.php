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

namespace Boo\BattleNet\Tests\Apis;

use Boo\BattleNet\RequestFactoryInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument\Token\TypeToken;
use Psr\Http\Message\RequestInterface;

abstract class AbstractApiTestCase extends TestCase
{
    /**
     * @var RequestFactoryInterface
     */
    protected $mockFactory;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $mockFactory = $this->prophesize(RequestFactoryInterface::class);
        $request = $this->prophesize(RequestInterface::class);
        $stringTypeToken = new TypeToken('string');

        $mockFactory->make(
            $stringTypeToken,
            $stringTypeToken
        )->will(function (array $args) use ($request) {
            $request->getMethod()->willReturn($args[0]);
            $request->getRequestTarget()->willReturn($args[1]);

            return $request->reveal();
        });

        $this->mockFactory = $mockFactory->reveal();
    }

}
