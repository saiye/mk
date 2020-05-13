<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/13
 * Time: 17:50
 */

namespace App\Lib;


class Upload
{
    private $mssage='';
    private $status=false;
    private $file_name='';
    private $config=[
        'allow_type'=>['jpg','jpeg','gif','png'],
        'upload_path'=>__DIR__,
    ];
    private $allow_type=['jpg','jpeg','gif','png'];

    public  function __construct($config)
    {
        $this->config=$config;
    }

    public function setMessage($msaage){
        $this->mssage=$msaage;
    }

    public function save($file){
        $file = isset($_FILES[$file])?$_FILES[$file]:false;
        if(!$file){
            $this->setMessage('file不存在!');
            return $this;
        }
        $name = $file['name'];
        $type = strtolower(substr($name,strrpos($name,'.')+1));
        if(!in_array($type, $this->allow_type)){
            $this->setMessage('file不存在!');
            return $this;
        }
        if(!is_uploaded_file($file['tmp_name'])){
            $this->setMessage('不是通过HTTP POST上传的');
            return $this;
        }
        $file_name=uniqid().'.'.$type;
        $upload_path=$this->config['upload_path'];
        if(!is_dir($upload_path)){
            mkdir($upload_path);
        }
        if(move_uploaded_file($file['tmp_name'],$upload_path.$file_name)){
            $this->setMessage('上传成功');
            $this->status=true;
            $this->file_name=$file_name;
            return $this;
        }
        $this->setMessage('上传失败');
        return $this;
    }

}