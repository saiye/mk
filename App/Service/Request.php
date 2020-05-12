<?php
/**
 * Created by 2020/5/11 0011 00:27
 * User: yuansai chen
 */

namespace App\Service;


class Request
{

    private $app = null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function get($key, $default = '')
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function post($key, $default = '')
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

}