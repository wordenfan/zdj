<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------


class orderModel extends MY_Model 
{   
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'order'; 
    }
    //获取数据
    public function getOrderInfo($where,$field='*')
    {
        $rdata = $this->db->select($field)
                 ->from($this->_table_name)
                 ->where($where)
                 ->get()
                 ->row_array();
        return $rdata;
    }
    //
    public function addOrder($idata)
    {
        $this->db->insert($this->_table_name, $idata); 
        
        if($insert_d = $this->db->insert_id())
        {
            return $insert_d ? $insert_d : 0;
        } else {
            show_message('',base_url(),3,'ordermodel写入数据失败');
            exit();
        }
    }
    //判断支付宝状态是否更改
    public function checkPayStatus($trade_code){
        $map['alipay_trade_code'] = $trade_code;
        $data = $this->getOrderInfo($map,'pay_status');
        if($data['pay_status'] == '1'){
            return true;
        }else{
            return false;
        }
    }
    //支付宝更改状态
    public function changePayStatus($trade_code) {
        $sql = 'update onethink_order set pay_status = 1 where alipay_trade_code = '.$trade_code;
        $res_boo = $this->db->query($sql);
        if(!$res_boo)
        {
            log_message('Error', '支付宝订单状态修改失败：'.$this->db->last_query());
            show_message('',base_url(),3,'支付宝订单状态错误，请联系客服');
        }
    }
}
