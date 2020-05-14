<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/14
 * Time: 17:20
 */

namespace App\Service;


class Config
{
    private static $app;

    public function __construct($app)
    {
        self::$app = $app;
    }

    public function get($key, $default = '')
    {
        $res = explode('.', $key);
        $file = CONFIG_PATH . DIRECTORY_SEPARATOR . $res[0] . '.php';
        if (is_file($file)) {
            $data = include $file;
        } else {
            $data = [];
        }
        if (count($res) == 1) {
            return $data;
        }
        if (count($res) == 2) {
            return $data[$res[1]] ?? $default;
        }
        if (count($res) == 3) {
            return $data[$res[1]][$res[2]] ?? $default;
        }
        if (count($res) == 4) {
            return $data[$res[1]][$res[2]][$res[3]] ?? $default;
        }
        if (count($res) == 5) {
            return $data[$res[1]][$res[2]][$res[3]][$res[4]] ?? $default;
        }
        return $default;
    }

    public static function __callStatic($name, $arguments)
    {
        dd(self::$app->make('config'));
        return self::$app->make('config')->$name($arguments);
    }
}