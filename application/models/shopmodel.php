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
    public function getShopList(){
        $where = array('status !=' => 0,'belongs'=>AREA_ID);
        $data = $this->db->select('*')
                ->from($this->_table_name)
                ->where($where)
                ->order_by('sort')
                ->get()
                ->result_array();
        return $data;
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
