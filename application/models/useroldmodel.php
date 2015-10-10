<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------


class UserOldModel extends MY_Model 
{   
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'user_old'; 
    }
    //查询状态
    public function getUserStatus($where)
    {
        $rdata = $this->db->select('*')
                 ->from($this->_table_name)
                 ->where($where)
                 ->get()
                 ->row_array();
        return empty($rdata)?1:2;
    }
    //添加
    public function addMemberOld($uid,$uname,$pay){
        $idata['uid'] = $uid;
        $idata['uname'] = $uname;
        $idata['order_sum'] = $pay;
        $idata['order_num'] = 1;
        $idata['first_order'] = $_SERVER['REQUEST_TIME'];
        $this->db->insert($this->_table_name, $idata); 
        $insert_d = $this->db->insert_id();
        return $insert_d ? $insert_d : 0; 
    }
    //更新
    public function updateMemberOld($uid,$uname,$pay)
    {
        $this->db->set('uname',$uname);
        $this->db->set('order_sum','order_sum+'.$pay, false);//第三个参数阻止被转义
        $this->db->set('order_num','order_num+1', false);
        $this->db->where(array('uid'=>$uid))->update($this->_table_name); 
    }
}
