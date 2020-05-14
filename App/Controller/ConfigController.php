<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/14
 * Time: 17:34
 */

namespace App\Controller;

use App\Service\BaseController;
use App\Service\Config;

class ConfigController extends BaseController
{
    public function index()
    {
        return Config::get('cache.redis');
    }

    public function i3()
    {
        return Config::get('cache.redis.read.host', '--');
    }

}