<?php
namespace Pwnraid\Bnet\Test;

class TestClient extends \Pwnraid\Bnet\Core\AbstractClient
{
    protected $game;

    public function __construct($game)
    {
        $this->game = $game;
    }

    public function get($url, array $options = [])
    {
        $query = (empty($options) === true) ? '' : implode('&', $options['query']);
        return getFixture($this->game, $url.'?'.$query);
    }

    public function getRawUrl($url, array $options = [])
    {
        return $this->get($url, $options);
    }
}
