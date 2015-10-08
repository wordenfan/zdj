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
	//读取全部信息，含地址
    public function getUserAllInfoById($uid) 
    {
		$base_info = $this->ci->umd->getUserInfo(array('uid'=>$uid));
        $address_info  = $this->ci->uamd->getUserAddress($uid);
        
        return array('base_info'=>$base_info,'address_info'=>$address_info);
	}
    //读取基本信息
    public function getUserBaseInfoById($uid){
        return $this->ci->umd->getUserInfo(array('uid'=>$uid));
    }
    //更新个人信息
    public function updateUser($uid,$data) {
        return $this->ci->umd->updateUser($uid,$data);
    }
    //============================地址===============================
    //读取用户地址
    public function getUserAddress($uid){
        return $this->ci->uamd->getUserAddress($uid);
    }
    //添加用户地址
    public function addAddress($uid,$data){
        return $this->ci->uamd->addAddress($uid,$data);
    }
    //更新用户地址
    public function updateAddress($id,$data){
        return $this->ci->uamd->updateAddress($id,$data);
    }
    //删除用户地址
    public function delAddress($id){
        return $this->ci->uamd->delAddress($id);
    }
    //设置默认地址
    public function setDefaultAddress($uid,$id) {
        return $this->ci->uamd->setDefault($uid,$id);
    }
    //============================新老用户===============================
    //判断用户状态,1为新用户,2为老用户
    public function getUserStatus($where) {
        $this->ci->load->model('useroldmodel','uomd');
        return $this->ci->uomd->getUserStatus($where);
    }
    //添加或更新userold表
    public function addUserOld($uid,$uname,$pay){
        $this->ci->load->model('useroldmodel','uomd');
        if(is_numeric($uid))
        {
            $where['uid'] = $uid;
        }
        $res = $this->ci->uomd->getUserStatus($where);
        if($res == 1){
            $this->ci->uomd->addMemberOld($uid,$uname,$pay);
        }elseif ($res == 2) {
            $this->ci->uomd->updateMemberOld($uid,$uname,$pay);
        }
    }
}
