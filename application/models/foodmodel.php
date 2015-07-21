<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class FoodModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'food'; 
        $this->type_table_name = 'food_type'; 
    }
    //查询List
    public function getFoodList($where){
        $data = $this->db->select('*')
                ->from($this->_table_name)
                ->where($where)
                ->order_by('sort')
                ->get()
                ->result_array();
        return $data;
    }
    //查询type
    public function getFoodType($where,$field='*') {
        $data = $this->db->select($field)
                ->from($this->type_table_name)
                ->where($where)
                ->get()
                ->result_array();
        return $data;
    }
}
