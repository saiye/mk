<?php
/**
 * Created by 2020/5/11 0011 00:27
 * User: yuansai chen
 */

namespace App\Service;
class Session extends \SessionHandler implements Handler
{

    private $app = null;

    private $handler=null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function handler()
    {
        $class='App\\Service\\SessionHandler\\'.ucfirst(SESSION_TYPE).'SessionHandler';
        if(SESSION_TYPE=='redis'){
            $this->handler=new $class($this->app->make('cache'));
        }else{
            $this->handler=new $class();
        }
        session_set_save_handler($this, true);
        session_save_path(SESSION_PATH);
    }

    public function close()
    {
      return  $this->handler->close();
    }

    public function destroy($session_id)
    {
        // TODO: Implement destroy() method.
        return   $this->handler->destroy($session_id);
    }

    public function gc($maxlifetime)
    {
        // TODO: Implement gc() method.
        return   $this->handler->gc($maxlifetime);
    }

    public function open($save_path, $name)
    {
        // TODO: Implement open() method.
        return  $this->handler->open($save_path, $name);
    }

    public function read($session_id)
    {
        // TODO: Implement read() method.
        return  $this->handler->read($session_id);
    }

    public function write($session_id, $session_data)
    {
        // TODO: Implement write() method.
        return   $this->handler->write($session_id, $session_data);
    }

    public function create_sid()
    {
        return   $this->handler->create_sid();
    }

}