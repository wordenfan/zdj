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
    //查询多个
    public function shopList($limit = 20, $offset = 1, $where = array(), $like = array()) 
    {
        $result =  $this->db->select('*')
                        ->from($this->_table_name)
                        ->like($like)
                        ->where($where)
                        ->limit($limit,($offset-1)*$limit)
                        ->order_by('id','DESC')
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
    //查单个shop
    public function getShop($where,$field='*'){
        $data = $this->db->select($field)
                ->from($this->_table_name)
                ->where($where)
                ->get()
                ->row_array();
        return $data;
    }
    //
    public function insert($data){
        $insert_id = $this->db->insert($this->_table_name,$data);
        return $insert_id;
    }
    //
    public function update($shop_id,$data){
        $this->db->where(array('id'=>$shop_id))->update($this->_table_name,$data);
        return $this->db->affected_rows();
    }
    
}
