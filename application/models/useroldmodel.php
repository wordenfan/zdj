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
    //获取数据
    public function getInfo($where)
    {
        $rdata = $this->db->select('*')
                 ->from($this->_table_name)
                 ->where($where)
                 ->get()
                 ->row_array();
        return $rdata;
    }
    //返回该订单用户用户状态
    public function addInfo($uid,$uname,$pay)
    {
        if(is_numeric($uid))
        {
            $where['uid'] = $uid;
        }
        $res = $this->getInfo($where);
        //新用户下单
        if(empty($res))
        {
            $idata['uid'] = $uid;
            $idata['uname'] = $uname;
            $idata['order_sum'] = $pay;
            $idata['order_num'] = 1;
            $idata['first_order'] = $_SERVER['REQUEST_TIME'];
            $this->db->insert($this->_table_name, $idata); 
            if($insert_d = $this->db->insert_id()){
                return $insert_d ? $insert_d : 0; //成功则返回1，因为uid不是自增
            } else {
                return 0;
            }
        }
        else{
            //老用户下单
            $this->updateMemberOld($uid,$uname,$pay);
            return 2;
        }
    }
    //更新用户订单信息
    protected function updateMemberOld($uid,$uname,$pay)
    {
        $idata = array(
            'uname'       => $uname,
            'order_sum'   => '`order_sum`+'.$pay,
            'order_num'   => '`order_num`+1',
        );
        $this->db->where(array('uid'=>$uid))->update($this->_table_name, $idata); 
    }
}
