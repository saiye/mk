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

        $router = $this->app->make('router');

        $router->register();

        $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

        $reponse = $router->distribute($uri, $param = []);

        if (is_string($reponse)) {
            echo $reponse;
            return;
        }

        if ($reponse instanceof Response) {
            return $reponse->send();
        }
        echo '---empty--view--';
    }
}