<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RedisModel extends MY_Model
{
    public $redis;
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->redis)
        {
            $this->redis = new Redis();
            $this->redis->connect(config_item('REDIS_HOST'),config_item('REDIS_PORT'));
        }
        return $this->redis;
    }
    //删除某键值
    public function del($key){
        if($this->redis->exists($key)){
            $this->redis->delete($key);
        }
    }
    //===================哈希===========
    //哈希_批量设置
    public function hmset($key,$val)
    {
        $this->redis->hmset($key,$val);
    }
    //哈希_获取
    public function hgetall($key)
    {
        $data = $this->redis->hGetAll($key);
        return $data;
    }
    //==================有序===========
    //集合_设置
    public function zadd($key,$score,$val){
        $this->redis->zAdd($key,$score,$val);
    }
    //集合_获取
    public function zrange($key){
        $data = $this->redis->zRange($key,0,-1);
        return $data;
    }
    //==================列表===========
    //
    public function rpush($key,$val){
        $this->redis->rPush($key,$val);
    }
    //获取长度
    public function llen($key){
        $data = $this->redis->lLen($key);
        return $data;
    }
    //==================无序===========
    //集合_设置
    public function sadd($key,$val){
        $this->redis->sAdd($key,$val);
    }
    //集合_获取
    public function smembers($key){
        $data = $this->redis->sMembers($key);
        return $data;
    }
}