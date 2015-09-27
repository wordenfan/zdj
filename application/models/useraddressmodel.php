<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */

class UserAddressModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'onethink_user_address'; 
    }
    //查询用户
    public function getUserAddress($uid){
        
        $data = $this->db->select('id,uid,tel,address,mark_address,status')
                    ->from($this->_table_name)
                    ->where(array('uid'=>$uid))
                    ->get()
                    ->result_array();
        return $data;
    }
}
