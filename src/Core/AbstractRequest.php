<?php
namespace Pwnraid\Bnet\Core;

abstract class AbstractRequest
{
    /**
     * @var AbstractClient
     */
    protected $client;

    /**
     * @param AbstractClient $client
     */
    public function __construct(AbstractClient $client)
    {
        $this->client = $client;
    }
}
