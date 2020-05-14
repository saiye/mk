<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/14
 * Time: 17:06
 */

namespace App\Service\CacheHandler;


interface CacheInterface
{
    public function put($key, $data);

    public function get($key, $default);

    public function forget($key);

    public function has($key);
}