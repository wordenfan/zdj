<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class FoodTypeModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'shop'; 
        $this->type_table_name = 'food_type'; 
    }
    //查询adminList
    public function selectFoodtypeInfo($where,$field='*')
    {
        $rdata = $this->db->select($field)
                 ->from($this->type_table_name)
                 ->where($where)
                ->order_by('shopid','DESC')
                ->get()
                ->result_array();
        return $rdata;
    }
    //
    public function add_type($data){
        $insert_id = $this->db->insert($this->type_table_name,$data);
        return $insert_id;
    }
}
