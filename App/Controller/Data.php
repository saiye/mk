<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/11
 * Time: 10:12
 */

namespace App\Controller;


use App\Service\BaseController;

class Data extends BaseController
{
    public function listData()
    {

        $request = $this->app->make('request');

        $path = $request->post('path');

        $data = [
            'status' => 1,
            'content' => '',
        ];
        if (is_file($path)) {
            $content = file_get_contents($path);
        }
        if ($content) {
            $data['content'] = $content;
        } else {
            $data['status'] = 0;
        }
        return $this->app->make('response')->json($data);
    }

}