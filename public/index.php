<?php
/**
 * Created by 2020/5/11 0011 00:09
 * User: yuansai chen
 */
define('BASE_PATH', dirname(__DIR__));

define('CONFIG_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'config');

define('VIEW_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'view');

define('STORAGE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'storage');

define('SESSION_PATH', STORAGE_PATH . DIRECTORY_SEPARATOR . 'session');

define('LOGO_PATH', STORAGE_PATH . DIRECTORY_SEPARATOR . 'logs');

define('SESSION_TYPE', 'redis');//file or redis

define('CACHE_TYPE', 'redis');//redis or mencached

include BASE_PATH . '/boostrap/boostrap.php';

