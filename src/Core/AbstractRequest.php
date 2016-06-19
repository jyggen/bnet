<?php
namespace Pwnraid\Bnet\Core;

abstract class AbstractRequest
{
    /**
     * @var AbstractClient
     */
    protected $client;

    protected $asJson = false;

    /**
     * @param AbstractClient $client
     */
    public function __construct(AbstractClient $client)
    {
        $this->client = $client;
    }

    public function asJson()
    {
        $this->asJson = true;

        return $this;
    }
}
