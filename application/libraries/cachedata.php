<?php 
class CacheData
{
    private $ci;
    
    public function __construct()
	{
        $this->ci = &get_instance();
        $this->ci->load->model('redismodel','redis_m');
	}
}
?>