<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/13
 * Time: 11:42
 */

namespace App\Controller;
use App\Lib\Image;

class Img
{

    public function  upload(){

    }

    public  function show(){
       $file=BasePath.DIRECTORY_SEPARATOR.'public/'.DIRECTORY_SEPARATOR.'1.PNG';
        $obj=new Image([
            'file'=>$file,
            'width'=>200,
            'height'=>300,
            'type'=>2,
            'save_path'=>BasePath.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'images',
        ]);
        $obj->show();
    }
}