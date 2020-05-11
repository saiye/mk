<?php
/**
 * Created by 2020/5/11 0011 00:45
 * User: yuansai chen
 */

namespace App\Controller;

use App\Service\BaseController;

class Index extends BaseController
{
    private static $list = [];
    private $maxDep=3;

    public function index()
    {
       // $dir = '/mnt/web/opt';
        $dir = BasePath;
        $list = $this->readDirList(static::$list, $dir);
        $data = compact('list');
        return $this->view('index', $data);
    }

    public function readDirList(&$list, $dir)
    {
        $nowDel=0;
        if (is_dir($dir)) {
            try {
                if ($dh = opendir($dir)) {
                    $nowDel++;
                    while (($fileName = readdir($dh)) !== false) {
                        if ($fileName != "." && $fileName != ".." && $fileName != '.git' && $fileName != '.svn' && $fileName != '.idea') {
                            $path = $dir . DIRECTORY_SEPARATOR . $fileName;
                            $type = filetype($path);
                            $item = [];
                            array_push($list, [
                                'path' => $path,
                                'type' => $type=='dir'?'folder':'file',
                                'title' => $fileName,
                                'children' =>$this->readDirList($item,$path),
                            ]);
                        }
                    }
                    closedir($dh);
                    //防止更深层，遍历目录
                    if($nowDel>$this->maxDep){
                        return $list;
                    }
                }
            }catch (\Exception $e){
                return [];
            }

        }
        return $list;
    }

}