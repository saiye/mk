<?php

namespace App\Service\SessionHandler;
use App\Service\Cache;

class RedisSessionHandler extends \SessionHandler
{
    /**
     * @var Cache
     */
    private $cache=null;

    public function __construct(Cache $cache)
    {
        $this->cache=$cache;
    }

    public function close()
    {
        return true;
    }

    public function create_sid()
    {
        return uniqid();
    }

    public function destroy($session_id)
    {
        $this->cache->forget($session_id);
    }

    public function gc($maxlifetime)
    {
        return true;
    }

    public function open($save_path, $session_name)
    {
        return true;
    }

    public function read($session_id)
    {
        return $this->cache->get($session_id);
    }

    public function write($session_id, $session_data)
    {
        return $this->cache->put($session_id,$session_data);
    }

    public function validateId($session_id)
    {
        return $this->cache->has($session_id);
    }
}