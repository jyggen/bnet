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

namespace Boo\BattleNet;

use Boo\BattleNet\Regions\RegionInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

final class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var RegionInterface
     */
    private $region;

    /**
     * @param RegionInterface $region
     * @param string          $apikey
     */
    public function __construct(RegionInterface $region, string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->region = $region;
    }

    /**
     * {@inheritdoc}
     */
    public function make(string $method, string $path, array $query = []): RequestInterface
    {
        $uri = new Uri(vsprintf('%s%s?%s', [
            $this->region->getApiBaseUrl(),
            $path,
            http_build_query(array_merge($query, [
                'apikey' => $this->apiKey,
                'locale' => $this->region->getLocale(),
            ]), null, '&', PHP_QUERY_RFC3986)
        ]));

        return new Request($method, $uri, [
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',
            'User-Agent' => 'boo/bnet',
        ]);
    }
}
