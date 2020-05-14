<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/13
 * Time: 11:42
 */

namespace App\Controller;
use App\Lib\Image;
use App\Service\BaseController;
class Session extends  BaseController
{

    public function  index(){
       $sid=$_GET['mk_session']??uniqid();
        if (!session_id()) {
           // session_name('mk_session');
            session_start();
        }
        $_SESSION['ok']='I` m session value';
        return $this->view('session/index', []);
    }

    public function show(){
        $sid=$_GET['mk_session']??uniqid();
        if (!session_id()){
          //  session_name('mk_session');
            session_start();
        }
        $str=isset($_SESSION['ok'])?$_SESSION['ok']:'-';
        $data=compact('str');
       return $this->view('session/show', $data);
    }


}