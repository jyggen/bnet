<?php
namespace Pwnraid\Bnet\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use Pwnraid\Bnet\Exceptions\BattleNetException;
use Pwnraid\Bnet\Region;
use SebastianBergmann\Version;
use Stash\Interfaces\ItemInterface;
use Stash\Interfaces\PoolInterface;

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
     * @var PoolInterface
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
     * @param string        $apiKey
     * @param Region        $region
     * @param PoolInterface $cache
     */
    public function __construct($apiKey, Region $region, PoolInterface $cache)
    {
        $this->apiKey  = $apiKey;
        $this->cache   = $cache;
        $this->region  = $region;
        $this->version = new Version(static::VERSION, dirname(dirname(__DIR__)));

        $this->cache->setNamespace(str_replace('\\', '', get_class($this)));
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
     * @param ResponseInterface $response
     * @param ItemInterface     $item
     * @param array|null        $data
     *
     * @throws \RuntimeException
     *
     * @return array
     */
    protected function handleSuccessfulResponse(ResponseInterface $response, ItemInterface $item, $data)
    {
        switch ((int) $response->getStatusCode()) {
            case 200:
                $data = json_decode($response->getBody(), true);
                if ($response->hasHeader('Last-Modified') === true) {
                    $item->set([
                        'modified' => $response->getHeader('Last-Modified'),
                        'json'     => $data,
                    ]);
                }
                return $data;
            case 304:
                return $data['json'];
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

        $item = $this->cache->getItem($this->getRequestKey($url, $options));
        $data = $item->get();

        if ($item->isMiss() === false) {
            $options = array_replace_recursive($options, [
                'headers' => [
                    'If-Modified-Since' => $data['modified'],
                ],
            ]);
        }

        $options = array_replace_recursive($options, [
            'headers' => [
                'Accept'     => 'application/json',
                'User-Agent' => $this->getUserAgent(),
            ],
            'query' => [
                'apikey' => $this->apiKey,
                'locale' => $this->region->getLocale(),
            ],
        ]);

        try {
            $response = $this->client->get($url, $options);
        } catch (ClientException $exception) {
            if ($exception->getCode() === 404) {
                return null;
            }

            throw new BattleNetException($exception->getResponse()->json()['detail'], $exception->getCode());
        }

        return $this->handleSuccessfulResponse($response, $item, $data);
    }
}
