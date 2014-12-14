<?php
namespace Pwnraid\Bnet\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Message\ResponseInterface;
use Pwnraid\Bnet\Exceptions\BattleNetException;
use Pwnraid\Bnet\Region;
use SebastianBergmann\Version;
use Stash\Interfaces\ItemInterface;
use Stash\Interfaces\PoolInterface;

abstract class AbstractClient
{
    const VERSION = '1.0';

    protected $apiKey;
    protected $cache;
    protected $client;
    protected $region;
    protected $version;

    public function __construct($apiKey, Region $region, PoolInterface $cache)
    {
        $this->apiKey  = $apiKey;
        $this->cache   = $cache;
        $this->region  = $region;
        $this->version = new Version(static::VERSION, dirname(dirname(__DIR__)));

        $this->cache->setNamespace(str_replace('\\', '', get_class($this)));

        $this->setClient(new GuzzleClient);
    }

    public function get($url, $options = [])
    {
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
            $response = $this->client->get($this->region->getApiHost(static::API).$url, $options);
        } catch (ClientException $exception) {
            if ($exception->getCode() === 404) {
                return null;
            }

            throw new BattleNetException($exception->getResponse()->json()['detail'], $exception->getCode());
        }

        return $this->handleSuccessfulResponse($response, $item, $data);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function getRequestKey($url, $options)
    {
        $options = array_replace_recursive($this->client->getDefaultOption(), $options);
        return hash_hmac('md5', $this->client->getBaseUrl().'/'.$url, serialize($options));
    }

    protected function getUserAgent()
    {
        static $defaultAgent = '';

        if ($defaultAgent === '') {
            $defaultAgent = 'pwnRaid/'.$this->version->getVersion().' '.GuzzleClient::getDefaultUserAgent();
        }

        return $defaultAgent;
    }

    protected function handleSuccessfulResponse(ResponseInterface $response, ItemInterface $item, $data)
    {
        switch ((int) $response->getStatusCode()) {
            case 200:
                if ($response->hasHeader('Last-Modified') === true) {
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
}
