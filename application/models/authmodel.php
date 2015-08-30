<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class AuthModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'auth_group'; 
    }
    //查询身份
    public function checkRole($uid){
        $admin = $this->getAdminList();
        $kefu = $this->getKefuList();
        if(in_array($uid, $admin))
        {
            return 'admin';
        }else if(in_array($uid, $kefu)){
            return 'kefu';
        }else{
            return 'guest';
        }
    }
    //查询adminList
    public function getAdminList(){
        $data = $this->db->select('member_id')
                ->from($this->_table_name)
                ->where('id',1)
                ->get()
                ->row_array();
        return $data;
    }
    //查询kefuList
    public function getKefuList(){
        $data = $this->db->select('member_id')
                ->from($this->_table_name)
                ->where('id',2)
                ->get()
                ->row_array();
        return $data;
    }
}
