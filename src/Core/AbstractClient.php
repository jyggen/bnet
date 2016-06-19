<?php
namespace Pwnraid\Bnet\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use Pwnraid\Bnet\Exceptions\BattleNetException;
use Pwnraid\Bnet\Region;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use SebastianBergmann\Version;

abstract class AbstractClient
{
    /**
     * @var string
     */
    const VERSION = '1.0';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var CacheItemPoolInterface
     */
    protected $cache;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Region
     */
    protected $region;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @param string                 $apiKey
     * @param Region                 $region
     * @param CacheItemPoolInterface $cache
     */
    public function __construct($apiKey, Region $region, CacheItemPoolInterface $cache = null)
    {
        $this->apiKey  = $apiKey;
        $this->cache   = $cache;
        $this->region  = $region;
        $this->version = new Version(static::VERSION, dirname(dirname(__DIR__)));
    }

    /**
     * @param string $url
     * @param array  $options
     *
     * @return array
     */
    public function get($url, array $options = [])
    {
        return $this->makeRequest($this->region->getApiHost(static::API).$url, $options);
    }

    /**
     * @param string $url
     * @param array  $options
     *
     * @return array
     */
    public function getRawUrl($url, array $options = [])
    {
        return $this->makeRequest($url, $options);
    }

    /**
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     *
     * @return void
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param array $options
     *
     * @return string
     */
    protected function getRequestKey($url, array $options)
    {
        $options = array_replace_recursive([
            'headers' => $this->client->getConfig('headers'),
            'query'   => $this->client->getConfig('query'),
        ], $options);

        return hash_hmac('md5', $url, serialize($options));
    }

    /**
     * @return string
     */
    protected function getUserAgent()
    {
        static $defaultAgent = '';

        if ($defaultAgent === '') {
            $defaultAgent = 'pwnRaid/'.$this->version->getVersion().' '.\GuzzleHttp\default_user_agent();
        }

        return $defaultAgent;
    }

    /**
     * @param ResponseInterface  $response
     * @param CacheItemInterface $item
     * @param array|null         $data
     *
     * @throws \RuntimeException
     *
     * @return array
     */
    protected function handleSuccessfulResponse(ResponseInterface $response, CacheItemInterface $item = null)
    {
        switch ((int) $response->getStatusCode()) {
            case 200:
                $data = json_decode($response->getBody(), true);
                if ($item !== null && $response->hasHeader('Last-Modified') === true) {
                    $item->set([
                        'modified' => $response->getHeader('Last-Modified'),
                        'json'     => $data,
                    ]);
                }
                return $data;
            case 304:
                return $item->get()['json'];
            default:
                throw new \RuntimeException('No support added for HTTP Status Code '.$response->getStatusCode());
        }
    }

    /**
     * @param string $url
     * @param array  $options
     *
     * @return array
     */
    protected function makeRequest($url, array $options = [])
    {
        if ($this->client === null) {
            $this->client = new GuzzleClient;
        }

        $item = null;

        if ($this->cache !== null) {
            $item = $this->cache->getItem($this->getRequestKey($url, $options));
            $data = $item->get();

            if ($item->isHit() === true) {
                $options = array_replace_recursive($options, [
                    'headers' => [
                        'If-Modified-Since' => $data['modified'],
                    ],
                ]);
            }
        }

        $options = array_replace_recursive($options, [
            'headers' => [
                'Accept'     => 'application/json',
                'Accept-Encoding' => 'gzip',
                'User-Agent' => $this->getUserAgent(),
            ],
            'query' => [
                'apikey' => $this->apiKey,
                'locale' => $this->region->getLocale(),
            ],
            'timeout' => 60,
        ]);

        try {
            $response = $this->client->get($url, $options);
        } catch (ClientException $exception) {
            switch ($exception->getCode()) {
                case 404:
                    $data = json_decode($exception->getResponse()->getBody(), true);
                    throw new BattleNetException($data['detail'], $exception->getCode());
                default:
                    $data = json_decode($exception->getResponse()->getBody(), true);
                    throw new BattleNetException($data['detail'], $exception->getCode());
            }
        }

        return $this->handleSuccessfulResponse($response, $item);
    }
}
