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

use Boo\BattleNet\Regions\EU;
use Boo\BattleNet\RequestFactory;
use Boo\BattleNet\RequestFactoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument\Token\TypeToken;
use Psr\Http\Message\RequestInterface;

abstract class AbstractApiTestCase extends TestCase
{
    /**
     * @var RequestFactoryInterface
     */
    private $apiFactory;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var RequestFactoryInterface
     */
    private $mockFactory;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->setUpMockFactory();

        $apiKey = getenv('API_KEY');

        if ($apiKey === false) {
            return;
        }

        $this->setUpApiFactory($apiKey);
        $this->setUpClient();
    }

    /**
     * Gets an implementation of RequestFactoryInterface.
     *
     * @return RequestFactoryInterface
     */
    protected function getApiFactory(): RequestFactoryInterface
    {
        if ($this->apiFactory === null) {
            $this->markTestSkipped('The environment variable API_KEY is not configured.');
        }

        return $this->apiFactory;
    }

    /**
     * Gets an implementation of ClientInterface.
     *
     * @return ClientInterface
     */
    protected function getClient(): ClientInterface
    {
        if ($this->client === null) {
            $this->markTestSkipped('The environment variable API_KEY is not configured.');
        }

        return $this->client;
    }

    /**
     * Gets a mocked implementation of RequestFactoryInterface.
     *
     * @return RequestFactoryInterface
     */
    protected function getMockFactory(): RequestFactoryInterface
    {
        return $this->mockFactory;
    }

    /**
     * Configures a implementation of RequestFactoryInterface.
     *
     * @param string $apiKey
     */
    private function setUpApiFactory(string $apiKey)
    {
        $this->apiFactory = new RequestFactory(new EU(), $apiKey);
    }

    /**
     * Configures a implementation of ClientInterface.
     */
    private function setUpClient()
    {
        $this->client = new Client();
    }

    /**
     * Configures a mocked implementation of RequestFactoryInterface.
     */
    private function setUpMockFactory()
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
