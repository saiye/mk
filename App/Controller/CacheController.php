<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/13
 * Time: 11:42
 */

namespace App\Controller;
use App\Service\BaseController;
class CacheController extends  BaseController
{

    public function  index(){

        $cache=$this->app->make('cache');

        $cache->put('name','yuansai');

        return $cache->get('name');
    }

}