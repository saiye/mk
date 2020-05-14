<?php
/**
 * Created by 2020/5/11 0011 00:42
 * User: yuansai chen
 */

$this->route('/','\\App\\Controller\\Index@index');

$this->route('/data/list','\\App\\Controller\\Data@listData');

$this->route('/img/show','\\App\\Controller\\Img@show');

$this->route('/session/index','\\App\\Controller\\Session@index');

$this->route('/session/show','\\App\\Controller\\Session@show');

$this->route('/config/index','\\App\\Controller\\ConfigController@index');

$this->route('/config/i3','\\App\\Controller\\ConfigController@i3');

$this->route('/cache/index','\\App\\Controller\\CacheController@index');



