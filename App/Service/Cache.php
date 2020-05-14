<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/14
 * Time: 17:05
 */

namespace App\Service;


use App\Service\CacheHandler\CacheInterface;

class Cache implements CacheInterface, Handler
{
    private static $app = null;

    private static $handler = null;

    public function __construct($app)
    {
        static::$app = $app;
        $class = 'App\\Service\\CacheHandler\\' . ucfirst(CACHE_TYPE) . 'CacheHandler';
        static::$handler = new $class($app);
    }
    public function handler()
    {

    }

    public function put($key, $data)
    {
        return static::$handler->put($key, $data);
    }

    public function get($key, $default = '')
    {
        return static::$handler->get($key, $default);
    }

    public function forget($key)
    {
        return static::$handler->forget($key);
    }

    public function has($key)
    {
        return static::$handler->has($key);
    }

    public function __call($method, $parameters)
    {
        return static::$handler->{$method}(...$parameters);
    }

    public static function __callStatic($method, $parameters)
    {
        return static::$app->make('cache')->{$method}(...$parameters);
    }
}