<?php
namespace Pwnraid\Bnet\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Pwnraid\Bnet\Exceptions\BattleNetException;
use Pwnraid\Bnet\Region;
use Stash\Interfaces\PoolInterface;

abstract class AbstractClient
{
    const VERSION = '1.0.0-dev';

    protected $apiKey;
    protected $cache;
    protected $client;
    protected $region;

    public function __construct($apiKey, Region $region, PoolInterface $cache = null)
    {
        $this->apiKey = $apiKey;
        $this->cache  = $cache;
        $this->region = $region;

        if ($this->cache !== null) {
            $this->cache->setNamespace(str_replace('\\', '', get_class($this)));
        }

        $this->client = new GuzzleClient([
            'base_url' => $this->region->getApiHost(static::API),
            'defaults' => [
                'headers' => [
                    'Accept'     => 'application/json',
                    'User-Agent' => 'pwnRaid/'.static::VERSION.' '.(new GuzzleClient)->getDefaultUserAgent(),
                ],
                'query' => [
                    'apikey'  => $this->apiKey,
                    'locale'  => $this->region->getLocale(),
                ],
            ],
        ]);
    }

    public function get($url, $options = [])
    {
        $key  = $this->getRequestKey($url, $options);

        if ($this->cache !== null) {
            $item = $this->cache->getItem($key);
            $data = $item->get();

            if ($item->isMiss() === false) {
                $options = array_replace_recursive($options, [
                    'headers' => [
                        'If-Modified-Since' => $data['modified'],
                    ],
                ]);
            }
        }

        try {
            $response = $this->client->get($url, $options);
        } catch (ClientException $exception) {
            if ($exception->getCode() === 404) {
                return null;
            }

            throw new BattleNetException($exception->getResponse()->json()['detail'], $exception->getCode());
        }

        switch ((int) $response->getStatusCode()) {
            case 200:
                if ($response->hasHeader('Last-Modified') && $this->cache !== null) {
                    $item->set([
                        'modified' => $response->getHeader('Last-Modified'),
                        'json'     => $response->json(),
                    ]);
                }
                return $response->json();
            case 304:
                return $data['json'];
            default:
                throw new \RuntimeException('No support added for HTTP Status Code '.$response->getStatusCode());
        }
    }

    protected function getRequestKey($url, $options)
    {
        $options = array_replace_recursive($this->client->getDefaultOption(), $options);
        return hash_hmac('md5', $this->client->getBaseUrl().'/'.$url, serialize($options));
    }
}
