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
    //查询用户,默认地址在第一个
    public function getUserAddress($uid){
        
        $data = $this->db->select('id,uid,tel,address,add_uname,mark_address,is_default,status')
                    ->from($this->_table_name)
                    ->where(array('uid'=>$uid))
                    ->order_by('is_default', 'DESC')
                    ->get()
                    ->result_array();
        return $data;
    }
    //更新
    public function updateAddress($id,$data){
        $this->db->where(array('id'=>$id))->update($this->_table_name,$data);
        return $this->db->affected_rows();
    }
    //添加
    public function addAddress($uid,$data){
        $this->db->insert($this->_table_name,$data);
        $id = $this->db->insert_id();
        $this->setDefault($uid, $id);
        
        return $id;
    }
    //删除
    public function delAddress($id){
        $this->db->where(array('id'=>$id))->delete($this->_table_name);
        return $this->db->affected_rows();
    }
    //设为默认
    public function setDefault($uid,$id) {
        $all_address = $this->getUserAddress($uid);
        foreach($all_address as $k=>$v){
            $all_address[$k]['is_default'] = 0;
            if($id == $v['id']){
                $all_address[$k]['is_default'] = 1;
            }
        }
        $this->db->update_batch($this->_table_name,$all_address,'id');
        
        return $this->db->affected_rows();
    }
}
