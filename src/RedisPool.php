<?php

declare(strict_types=1);

namespace Aswoole\DB;

class RedisPool
{
    protected $pool;

    protected $connection;

    public function __construct($config = null)
    {
        if (! empty($config)) {
            $this->pool = Redis::getInstance($config);
        } else {
            $this->pool = Redis::getInstance();
        }
        $this->connection = $this->pool->getConnection();
    }

    public function __call($name, $arguments)
    {
        return $this->connection->{$name}(...$arguments);
    }
}
