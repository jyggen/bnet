<?php
namespace Pwnraid\Bnet\Test;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Pwnraid\Bnet\Region;
use Stash\Driver\Ephemeral;
use Stash\Pool;

class TestClient extends \Pwnraid\Bnet\Core\AbstractClient
{
    protected $game;
    protected $mock;

    public function __construct($game)
    {
        $this->game   = $game;
        $this->mock   = new MockHandler([]);
        $this->client = new Client([
            'handler' => HandlerStack::create($this->mock)
        ]);

        parent::__construct('foobar', new Region(Region::EUROPE), new Pool(new Ephemeral));
    }

    public function get($url, array $options = [])
    {
        $query = (empty($options) === true) ? '' : implode('&', $options['query']);
        $body  = getFixture($this->game, $url.'?'.$query);

        $this->mock->append(new Response(200, [], $body));

        return $this->makeRequest($this->region->getApiHost($this->game).$url, $options);
    }

    public function getRawUrl($url, array $options = [])
    {
        return $this->get($url, $options);
    }
}
