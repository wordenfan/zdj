<?php
/**
 * Description of pipeline
 *
 * @author worden
 */
class Pipeline_test extends CI_Controller{
    
    public $redis;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('redismodel','redis_m');
        
        $this->redis = $this->redis_m->redis;
        set_time_limit(0);
    }
    public function test_pipeline() {
        echo microtime().'<br>';
        echo microtime(TRUE).'<br>';
        echo mktime().'<br>';
        
        
        //=======
        $this->G('k');
        $pipe = $this->redis->multi(Redis::PIPELINE);
        for ($i=0; $i < 10 ; $i++) { 
           $pipe->set("test_{$i}", pow($i, 2));
           $pipe->get("test_{$i}");
        }
        $replies = $pipe->exec();
        var_dump($replies);
        $this->G('k','n');
        
        
        //=======
        $this->G('t');
        $this->redis->pipeline();
        for ($i=0; $i < 100000 ; $i++) { 
           $this->redis->set("test_{$i}", pow($i, 2));
           $this->redis->get("test_{$i}");
        }
        $this->redis->exec();
        $this->G('t','r');
        
        //=======
        $this->G('m');
        $this->redis->multi();
        for ($i=0; $i < 100000 ; $i++) { 
           $this->redis->set("test_{$i}", pow($i, 2));
           $this->redis->get("test_{$i}");
        }
        $this->redis->exec();
        $this->G('m','i');

        $this->redis->flushdb();
        
        //========
        $this->G('f');
        for ($i=0; $i < 100000 ; $i++) { 
           $this->redis->set("test_{$i}", pow($i, 2));
           $this->redis->get("test_{$i}");
        }
        $this->G('f','e');
    }
    //计时函数
    public function G($start,$end='',$dec=4)
    {
        static $_info = array();
        if (!empty($end))
        {
            if(!isset($_info[$end])) $_info[$end] = microtime(TRUE);
            $sconds = number_format(($_info[$end]-$_info[$start]), $dec) * 1000;
            echo "{$sconds}ms<br />";
        }
        else
        {
            $_info[$start] = microtime(TRUE);
        }
    }

}
