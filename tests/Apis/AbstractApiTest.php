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

namespace Boo\BattleNet\Tests\Apis;

use Boo\BattleNet\Regions;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Http\Factory\Guzzle\RequestFactory;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;

abstract class AbstractApiTest extends TestCase
{
    public function apiDepedencyProvider(): array
    {
        return [];
    }

    final protected function getApiKey(): string
    {
        $apiKey = getenv('BNET_API_KEY');

        if ($apiKey === '') {
            $apiKey = false;
        }

        return false !== $apiKey ? $apiKey : 'foobar';
    }

    final protected function getClient(): ClientInterface
    {
        $mockClient = $this->prophesize(ClientInterface::class);

        $mockClient->send(Argument::type(RequestInterface::class))->willReturn(new Response());

        return 'foobar' !== $this->getApiKey() ? new Client([
            'http_errors' => false,
        ]) : $mockClient->reveal();
    }

    final protected function getRegion(): Regions\RegionInterface
    {
        return new Regions\EU();
    }

    final protected function getRequestFactory(): RequestFactoryInterface
    {
        return new RequestFactory();
    }
}
