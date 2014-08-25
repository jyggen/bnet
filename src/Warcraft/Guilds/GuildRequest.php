<?php
namespace Pwnraid\Bnet\Warcraft\Guilds;

use Pwnraid\Bnet\Core\AbstractRequest;

class GuildRequest extends AbstractRequest
{
    protected $realm;

    public function find($name, array $fields = [])
    {
        if ($this->realm === null) {
            throw new \RuntimeException('You must set a realm name with on() before calling find().');
        }

        $data = $this->client->get('guild/'.$this->realm.'/'.$name, ['query' => ['fields' => implode(',', $fields)]]);

        if ($data === null) {
            return null;
        }

        return new GuildEntity($data);
    }

    public function on($realm)
    {
        $this->realm = $realm;
        return $this;
    }
}
