<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RedisModel
{
    public $redis;
    
    public function __construct()
    {
        if(!$this->redis)
        {
            $this->redis = new Redis();
            $this->redis->connect("127.0.0.1","6379");
        }
        return $this->redis;
    }
    public function hmset($key,$val)
    {
        $this->redis->hmset($key,$val);
        
//        var_dump($this->redis->hgetall("login_userList"));
//        exit;
    }
}