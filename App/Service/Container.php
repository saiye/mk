<?php
/**
 * Created by 2020/5/11 0011 00:23
 * User: yuansai chen
 */
namespace App\Service;

class Container
{
    protected $binds;

    protected  $instances;



    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof \Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }
    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        array_unshift($parameters, $this);

        if(isset($this->binds[$abstract])){

            $this->instances[$abstract]=call_user_func_array($this->binds[$abstract], $parameters);

            return $this->instances[$abstract];
        }
        throw new \Exception('不存在类'.$abstract);
    }
}