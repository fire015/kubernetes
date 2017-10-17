<?php

namespace App;

class Host
{
    const HOSTS_KEY = 'hosts';

    /**
     * @var Redis
     */
    private $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function register(string $hostname)
    {
        $this->redis->hincrby(static::HOSTS_KEY, $hostname, 1);
    }

    public function getHosts(): array
    {
        return $this->redis->hgetall(static::HOSTS_KEY);
    }
}