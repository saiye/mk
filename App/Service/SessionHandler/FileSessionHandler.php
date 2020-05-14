<?php

namespace App\Service\SessionHandler;
class FileSessionHandler extends \SessionHandler
{
    private $session_name ='';

    private $save_path = '/tmp';

    /**
     * 会话存储的返回值（通常成功返回 0，失败返回 1）。
     */
    public function close()
    {
        return true;
    }


    public function create_sid()
    {
        return 'mk_' . uniqid();
    }

    public function destroy($session_id)
    {
        return unlink($this->save_path . DIRECTORY_SEPARATOR . $this->session_name . $session_id);
    }

    public function gc($maxlifetime)
    {
        return true;
    }

    public function open($save_path, $session_name)
    {
        $this->save_path = $save_path;
        $this->session_name = $session_name;
        return true;
    }

    public function read($session_id)
    {
        $file = $this->save_path . DIRECTORY_SEPARATOR . $this->session_name . $session_id;
        if (is_file($file)) {
            return file_get_contents($file);
        }
        return '';
    }

    public function write($session_id, $session_data)
    {
        file_put_contents($this->save_path . DIRECTORY_SEPARATOR . $this->session_name . $session_id, $session_data, LOCK_EX);
        return true;
    }

    public function validateId($session_id)
    {
        return is_file($this->save_path . DIRECTORY_SEPARATOR . $this->session_name . $session_id);
    }

}