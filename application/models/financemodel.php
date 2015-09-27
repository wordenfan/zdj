<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class FinanceModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'finance_history'; 
    }
    //查询多个
    public function financeList($limit = 20, $offset = 1, $where = array(), $like = array()) 
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
}
