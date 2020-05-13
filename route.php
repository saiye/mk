<?php
/**
 * Created by 2020/5/11 0011 00:42
 * User: yuansai chen
 */

$this->route('/','\\App\\Controller\\Index@index');


$this->route('/data/list','\\App\\Controller\\Data@listData');


$this->route('/img/show','\\App\\Controller\\Img@show');



