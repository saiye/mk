<?php
/**
 * Created by 2020/5/11 0011 00:10
 * User: yuansai chen
 */
function dd($data){
    var_dump($data);exit;
}
 spl_autoload_register(function ($class) {
         $file = dirname(__DIR__).DIRECTORY_SEPARATOR. str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
         if (is_file($file)) {
             include_once $file;
         }
   },true,true);

(new App\Service\App())->start();

