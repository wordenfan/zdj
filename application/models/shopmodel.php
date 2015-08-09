<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class ShopModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'shop'; 
        $this->type_table_name = 'food_type'; 
    }
    //查询adminList
    public function selectShopInfo($operation,$where,$field='*',$per_page=20,$start_get=1)
    {
        $query = $this->db->select($field)
                 ->from($this->_table_name)
                 ->where($where);
        switch ($operation)
        {
           case 1:
               $rdata = $query->limit($per_page,($start_get-1)*$per_page)
                              ->order_by('id','DESC')
                              ->get()
                              ->result_array();
               break;
           case 2:
               $rdata = $query->count_all_results();
               break;
        }
                
        return $rdata;
    }
    //查单个shop
    public function getShop($where,$field='*'){
        $data = $this->db->select($field)
                ->from($this->_table_name)
                ->where($where)
                ->get()
                ->row_array();
        return $data;
    }
}
