<?php
/**
 * Created by 2020/5/11 0011 00:09
 * User: yuansai chen
 */
define('BASE_PATH', dirname(__DIR__));

const CONFIG_PATH = BASE_PATH.DIRECTORY_SEPARATOR.'config';

const VIEW_PATH = BASE_PATH.DIRECTORY_SEPARATOR.'view';

const STORAGE_PATH = BASE_PATH.DIRECTORY_SEPARATOR.'storage';

const SESSION_PATH = STORAGE_PATH.DIRECTORY_SEPARATOR.'session';

const LOGO_PATH = STORAGE_PATH.DIRECTORY_SEPARATOR.'logs';

const SESSION_TYPE = 'redis';//file or redis

const CACHE_TYPE = 'redis';//redis or mencached

include BASE_PATH . '/boostrap/boostrap.php';

