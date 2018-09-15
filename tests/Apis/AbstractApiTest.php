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

use Boo\BattleNet\Apis\Diablo\ActApi;
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

        return $apiKey !== false ? $apiKey : 'foobar';
    }

    final protected function getClient(): ClientInterface
    {
        $apiKey = getenv('BNET_API_KEY');
        $mockClient = $this->prophesize(ClientInterface::class);

        $mockClient->send(Argument::type(RequestInterface::class))->willReturn(new Response());

        return $apiKey !== false ? new Client([
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
