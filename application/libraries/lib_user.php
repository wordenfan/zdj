<?php

class Lib_user
{
    private $ci;
    
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('usermodel','umd');
        $this->ci->load->model('useraddressmodel','uamd');
    }
	//
    public function getUserById($uid) 
    {
		$base_info = $this->ci->umd->getUserInfo(array('uid'=>$uid));
        $address_info  = $this->ci->uamd->getUserAddress($uid);
        
		return array('base_info'=>$base_info,'address_info'=>$address_info);
	}
}
