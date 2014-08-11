<?php
namespace Pwnraid\Bnet;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use Pwnraid\Bnet\Warcraft\Client as WarcraftClient;
use RuntimeException;
use Stash\Interfaces\PoolInterface;

abstract class BaseClient
{
    const VERSION = '0.1-dev';

    public static $locales = [];
    public static $regions = [];

    protected $cache;
    protected $client;
    protected $locale;
    protected $region;

    public function __construct($region, PoolInterface $cache)
    {
        $region = mb_strtoupper($region, 'UTF-8');

        if (array_key_exists($region, static::$regions) === false) {
            throw new RuntimeException('Region "'.$region.'" is not available');
        }

        $this->region = $region;
        $this->locale = static::$locales[$this->region][0];

        $cache->setNamespace(str_replace('\\', '', get_class($this)));

        $this->cache  = $cache;
        $this->client = new GuzzleClient([
            'base_url' => static::$regions[$this->region],
            'defaults' => [
                'headers' => [
                    'Accept'     => 'application/json',
                    'User-Agent' => 'pwnRaid/'.static::VERSION.' '.GuzzleClient::getDefaultUserAgent(),
                ],
                'query' => [
                    'locale'  => $this->locale,
                ],
            ],
        ]);
    }

    public function get($url, $options = [])
    {
        $key  = $this->getRequestKey($url, $options);
        $item = $this->cache->getItem($key);
        $data = $item->get();

        if ($item->isMiss() === false) {
            $this->client->setDefaultOption('headers/If-Modified-Since', $data['modified']);
        }

        try {
            $response = $this->client->get($url, $options);
        } catch (ClientException $exception) {
            if ($exception->getCode() === 404) {
                return null;
            }
            throw new \RuntimeException($exception->getMessage());
        }

        switch ((int) $response->getStatusCode()) {
            case 200:
                if (empty($response->getHeader('Last-Modified')) === false) {
                    $item->set([
                        'modified' => $response->getHeader('Last-Modified'),
                        'json'     => $response->json(),
                    ]);
                }
                return $response->json();
            case 304:
                return $data['json'];
            default:
                throw new \RuntimeException('No support added for HTTP Status Code '.$response->getStatusCode().'.');
                break;
        }
    }

    public function setLocale($locale)
    {

        if ($locale !== null) {

            if (in_array($locale, static::$locales[$this->region]) === false) {
                throw new RuntimeException('Locale "'.$locale.'" is not available');
            }

            $this->locale = $locale;
        } else {
            $this->locale = static::$locales[$this->region][0];
        }

        $this->client->setDefaultOption('query', ['locale' => $this->locale]);
    }

    protected function getRequestKey($url, $options)
    {
        return $this->region.'/'.$url.'/'.md5(serialize($options));
    }
}
