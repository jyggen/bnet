<?php
namespace Pwnraid\Bnet\Core;

abstract class AbstractRequest
{
    protected $client;

    public function __construct(AbstractClient $client)
    {
        $this->client = $client;
    }
}
