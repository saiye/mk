<?php
/**
 * Created by 2020/5/11 0011 00:28
 * User: yuansai chen
 */

namespace App\Service;


class Response
{
    private $message = '';

    private $contentType = 'Content-Type: text/html;charset=utf-8';

    private $app = null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function body($data)
    {
        $this->data($data);
        return $this;
    }

    public function json($data)
    {
       return  $this->data(json_encode($data))->contentType('content-type:application/json;charset=utf-8');
    }

    private function contentType($type){
        $this->contentType=$type;
        return $this;
    }

    private function data($data)
    {
        $this->message = $data;
        return $this;
    }

    public function send()
    {
        header($this->contentType);
        echo $this->message;
    }
}