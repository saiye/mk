<?php


namespace App\Service;


class BaseController
{

    protected $app=null;

    public  function __construct($app)
    {
        $this->app=$app;
    }
    public function view($file,$data){
        extract($data);
        ob_start();
        include  BasePath.DIRECTORY_SEPARATOR.'view'.DIRECTORY_SEPARATOR.$file.'.php';
         $message=ob_get_contents();
         ob_end_clean();
       return  $this->app->make('response')->body($message);
    }
}