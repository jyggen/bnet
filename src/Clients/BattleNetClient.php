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

namespace Boo\BattleNet\Clients;

use Boo\BattleNet\Endpoints\EndpointInterface;
use Boo\BattleNet\Regions\RegionInterface;
use Boo\BattleNet\Regions\US;
use Psr\Http\Client\ClientInterface as PsrClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;

final class BattleNetClient implements ClientInterface
{
    /**
     * @var AccessTokenInterface|null
     */
    private $accessToken;

    /**
     * @var PsrClientInterface
     */
    private $client;

    /**
     * @var RegionInterface
     */
    private $region;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    public function __construct(
        PsrClientInterface $client,
        RequestFactoryInterface $requestFactory
    ) {
        $this->client = $client;
        $this->region = new US();
        $this->requestFactory = $requestFactory;
    }

    public function authorize(AccessTokenInterface $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function call(EndpointInterface $endpoint): ResponseInterface
    {
        $this->requestFactory->createRequest($endpoint->getMethod(), '');
    }

    public function changeRegion(RegionInterface $region): void
    {
        $this->region = $region;
    }
}
