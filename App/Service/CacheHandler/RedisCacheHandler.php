<?php

namespace App\Service\CacheHandler;

use App\Service\Config;
use App\Service\Handler;

class RedisCacheHandler implements CacheInterface
{
    private $redis = null;
    private $app = null;

    public function __construct($app)
    {
        $this->app=$app;

        $config = $app->make('config')->get('cache.redis');

        try {
            $this->redis = new \Redis();
            $this->redis->connect($config['host'], $config['port']);
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function put($key, $data)
    {
       return  $this->redis->set($key,$data);
    }

    public function get($key, $default)
    {
       return  $this->redis->get($key);
    }

    public function forget($key)
    {
        return $this->redis->del($key);
    }

    public function has($key)
    {
        $value = $this->redis->get($key);
        if (!$value) {
            return false;
        }
        return true;
    }

    public function __call($method, $parameters)
    {
        return $this->redis->{$method}(...$parameters);
    }
}