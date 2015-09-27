<?php
/**
 * 插件方法名必须与mysql表中的name字段值相同
 *
 * @author Administrator
 */
class AddonsModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'addons'; 
    }
    //减免配送费
    public function freeSend(){
		$where['name'] = strval(__FUNCTION__);
		$fdata = $this->db->select('*')->from($this->_table_name)->where($where)->get()->row_array();
		$json_arr = json_decode($fdata['value'],true);
		$data = explode(',',$json_arr['shop_list']);
		return $data;
    }
}
