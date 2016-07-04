<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Test;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\BadResponseException;
use Pwnraid\Bnet\Region;

class FixtureClient extends \Pwnraid\Bnet\Core\AbstractClient
{
    protected static $meta;
    protected $apiKey;
    protected $game;

    public function __construct($apiKey, $game)
    {
        $this->apiKey = $apiKey;
        $this->region = new Region(Region::EUROPE);
        $this->game = $game;
        $this->client = new GuzzleClient([
            'base_uri' => rtrim($this->region->getApiHost(''), '/'),
        ]);
    }

    public function getRawUrl($url, array $options = [])
    {
        return $this->get($url, $options, true);
    }

    public function get($url, array $options = [], $raw = false)
    {
        $query = (array_key_exists('query', $options) === false) ? '' : implode('&', $options['query']);
        $url = $url.'?'.$query;
        $filename = urlToFilename($this->game, $url);
        $fixture = $this->getFixture($filename);
        $success = false;

        if (strtotime($fixture['modified']) < strtotime('-1 day')) {
            do {
                try {
                    $url = ($raw === true) ? $url : $this->game.'/'.$url;
                    $response = $this->client->get($url, array_replace_recursive($options, [
                        'headers' => [
                            'If-Modified-Since' => $fixture['modified'],
                            'Accept' => 'application/json',
                            'User-Agent' => 'pwnRaid/'.static::VERSION.' '.\GuzzleHttp\default_user_agent(),
                        ],
                        'query' => [
                            'apikey' => $this->apiKey,
                            'locale' => $this->region->getLocale(),
                        ],
                    ]));

                    $this->saveFixture($filename, $response);
                    $success = true;
                } catch (BadResponseException $exception) {
                    echo "\033[0m[\033[31m".$exception->getCode()."\033[0m][".md5($filename).'] '.$filename.PHP_EOL;
                }
            } while ($success === false);
        } else {
            echo "\033[0m[\033[33m304\033[0m][".md5($filename).'] '.$filename.PHP_EOL;
        }

        return json_decode($this->getFixture($filename)['content'], true);
    }

    protected function getFixture($filename)
    {
        if (static::$meta === null) {
            static::$meta = json_decode(file_get_contents(FIXTURES_DIR.'/meta.json'), true);
        }

        if (array_key_exists(md5($filename), static::$meta)) {
            return [
                'modified' => static::$meta[md5($filename)],
                'content' => file_get_contents('compress.zlib://'.FIXTURES_DIR.'/'.$filename),
            ];
        }

        return [
            'modified' => date(DATE_RFC1123, 0),
            'content' => '',
        ];
    }

    protected function saveFixture($filename, $response)
    {
        switch ((int) $response->getStatusCode()) {
            case 200:
                if ($response->hasHeader('Last-Modified')) {
                    if (is_array($response->getHeader('Last-Modified'))) {
                        static::$meta[md5($filename)] = $response->getHeader('Last-Modified')[0];
                    } else {
                        static::$meta[md5($filename)] = $response->getHeader('Last-Modified');
                    }
                } else {
                    static::$meta[md5($filename)] = date(DATE_RFC1123, time());
                }
                ksort(static::$meta);
                file_put_contents(FIXTURES_DIR.'/meta.json', json_encode(static::$meta));
                file_put_contents('compress.zlib://'.FIXTURES_DIR.'/'.$filename, (string) $response->getBody());
                echo "\033[0m[\033[32m200\033[0m][".md5($filename).'] '.$filename.PHP_EOL;
                break;
            case 304:
                print "\033[0m[\033[33m304\033[0m][".md5($filename).'] '.$filename.PHP_EOL;
                break;
            default:
                throw new \RuntimeException('No support added for HTTP Status Code '.$response->getStatusCode());
        }
    }
}
