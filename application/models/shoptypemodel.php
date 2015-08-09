<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class ShopTypeModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'shop'; 
        $this->type_table_name = 'food_type'; 
    }
    //查询adminList
    public function selectShoptypeInfo($where,$field='*')
    {
        $rdata = $this->db->select($field)
                 ->from($this->type_table_name)
                 ->where($where)
                ->order_by('id','DESC')
                ->get()
                ->result_array();
        return $rdata;
    }
}
