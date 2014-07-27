<?php
namespace Pwnraid\Bnet;

abstract class BaseRequest
{
    protected $client;

    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }
}
