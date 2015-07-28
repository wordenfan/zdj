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
}
