<?php
/**
 * Created by 2020/5/11 0011 00:13
 * User: yuansai chen
 */

namespace App\Service;

class App
{
    private $app = null;

    private $boostrapClass = [
        'router' => Router::class,
        'response' => Response::class,
        'request' => Request::class,
        'session' => Session::class,
        'config' => Config::class,
        'cache' => Cache::class,
        'exception_handler' => ExceptionHandler::class,
    ];
    private $handlers = [
        'exception_handler',
        'session',
        'router',
        'cache',
    ];

    public function __construct()
    {
        $this->app = new Container();
    }

    public function start()
    {
        $this->boot();
        $this->handler();
    }

    public function boot()
    {
        foreach ($this->boostrapClass as $key => $class) {
            $this->app->bind($key, function () use ($class) {
                return new $class($this->app);
            });
        }
    }

    public function handler()
    {
        foreach ($this->handlers as $key) {
           $this->app->make($key)->handler();
        }
    }
}