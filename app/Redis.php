<?php

namespace App;

use Predis\Client;

class Redis
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(string $connection)
    {
        $this->client = new Client($connection);
    }

    public function __call($commandID, $arguments)
    {
        return $this->client->$commandID(...$arguments);
    }
}