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
    //查询多个
    public function orderList($limit = 20, $offset = 1, $where = array(), $like = array()) 
    {
        $result =  $this->db->select('*')
                        ->from($this->_table_name)
                        ->like($like)
                        ->where($where)
                        ->limit($limit,($offset-1)*$limit)
                        ->order_by('snid','DESC')
                        ->get()
                        ->result_array();
        
        $count =  $this->db->select('COUNT(*) AS count')
                           ->from($this->_table_name)
                           ->like($like)
                           ->where($where)
                           ->get()
                           ->row()->count;

        return array('data' => $result, 'total' => $count);
    }
    //
    public function addOrder($idata)
    {
        $this->db->insert($this->_table_name, $idata); 
        
        if($insert_d = $this->db->insert_id())
        {
            $this->load->model('redismodel','redis_m');
            $this->redis_m->rpush('order',$insert_d);
            return $insert_d;
        } else {
            log_message('Error', 'ordermodel写入数据失败=/='.$this->db->last_query());
            show_message('',base_url(),3,'订单添加失败');
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
    //
    public function changeOrderStatus($oid,$data){
        $this->db->where('oid',$oid)->update($this->_table_name,$data);
        return $this->db->affected_rows();
    }
}
