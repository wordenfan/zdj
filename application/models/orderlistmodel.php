<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------


class orderListModel extends MY_Model 
{   
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'order_list'; 
    }
    //获取数据
    public function getOrderListInfo($where,$field='*')
    {
        $rdata = $this->db->select($field)
                 ->from($this->_table_name)
                 ->where($where)
                 ->get()
                 ->result_array();
        return $rdata;
    }
}
