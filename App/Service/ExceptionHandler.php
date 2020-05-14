<?php
/**
 * Created by : PhpStorm
 * User: yuansai chen
 * Date: 2020/5/14
 * Time: 19:29
 */

namespace App\Service;


class ExceptionHandler implements Handler
{


    public function handler()
    {
      //  set_error_handler([$this, 'HandleError']);

         set_exception_handler([$this, 'HandleException']);
    }

    public function HandleError($code, $message, $file = null, $line = 0, $context = [])
    {
        $error_file = LOGO_PATH . date('Y-m-d') . '.log';

        file_put_contents($error_file, $message, FILE_APPEND);

        $data = compact('code', 'message', 'file', 'line', 'context');

        $this->view('500', $data);
    }

    public function HandleException($exception)
    {
        $error_file = LOGO_PATH . date('Y-m-d') . '.log';

        file_put_contents($error_file, $exception->getMessage(), FILE_APPEND);

        $data = compact('exception');
        $this->view('500', $data);
    }

    public function view($f, $data = [])
    {
        if ($data) {
            extract($data);
        }
        $f = BASE_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'errors' . DIRECTORY_SEPARATOR . $f . '.php';
        ob_start();
        include $f;
        ob_flush();
        exit;
    }
}