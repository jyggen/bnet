<?php
namespace Pwnraid\Bnet\Test;

class TestClient extends \Pwnraid\Bnet\Core\AbstractClient
{
    protected $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function get($url, $options = null)
    {
        $query = ($options === null) ? '' : implode('&', $options['query']);
        return getFixture($this->game, $url.'?'.$query);
    }
}
