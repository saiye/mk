<?php
/**
 * Created by 2020/5/11 0011 00:28
 * User: yuansai chen
 */

namespace App\Service;


class Router
{
    private static $routesClosure = [];
    private static $routesString = [];

    private $app = null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function route($uri, $concrete)
    {

        if ($concrete instanceof \Closure) {
            static::$routesClosure[$uri] = $concrete;
        } else {
            static::$routesString[$uri] = $concrete;
        }
    }

    /**
     * 分发路由
     */
    public function distribute($uri, $param = [])
    {

        if (isset(static::$routesClosure[$uri])) {

            return call_user_func_array(static::routesClosure[$uri], $param);
        }
        if (isset(static::$routesString[$uri])) {

            list($controler, $action) = explode('@', static::$routesString[$uri]);

            return call_user_func([new $controler($this->app), $action], $param);

        }
        return $this->app->make('response')->body('404 不存在路由' . $uri);
    }

    /**
     * 注册路由
     */
    public function register()
    {
        include BasePath . DIRECTORY_SEPARATOR . 'route.php';
    }
}