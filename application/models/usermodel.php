<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */

class UserModel extends MY_Model
{
    private $_table_name;
    private $_address_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'onethink_user'; 
        $this->_address_table_name = 'onethink_user_address'; 
        $this->load->model('redismodel','redisM');
    }
    
    //查询adminList,$field目前为全查询
    public function selectUserInfo($operation,$where,$field='*',$per_page=20,$start_get=1)
    {   
        $query = $this->db->select('onethink_user.*,onethink_user_address.add_uname,onethink_user_address.tel,onethink_user_address.address,onethink_user_address.mark_address')
                 ->from($this->_table_name)
                 ->join($this->_address_table_name, 'onethink_user.uid = onethink_user_address.uid AND onethink_user_address.is_default = 1','left')
                 ->where($where);
        switch ($operation)
        {
           case 1:
               $rdata = $query->limit($per_page,($start_get-1)*$per_page)
                              ->order_by('onethink_user.uid','DESC')
                              ->group_by("onethink_user.uid")
                              ->get()
                              ->result_array();
               break;
           case 2:
               $rdata = $query->count_all_results();
               break;
        }       
        return $rdata;
    }
    
    //查询用户
    public function getUserInfo($where,$field='*'){
        
        $data = $this->db->select($field)
                    ->from($this->_table_name)
                    ->where($where)
                    ->get()
                    ->row_array();
        return $data;
    }
    
    //登录
    public function login($where, $pwd)
    {
        //验证用户密码
        $user = $this->getUserInfo($where,'uid,uname,reg_tel,password,status');
        if($user && $user['status'])
        {
            if(think_ucenter_md5($pwd,config_item('USER_AUTH_KEY')) === $user['password'])
            {
                $this->autoLogin($user['uid']);
                return $user['uid'];
            } else {
                return -2;//密码错误
            }
        } else {
            return -1;//用户不存在或被禁用
        }
    }
    //增加用户
    public function addUser($uname,$reg_tel,$pwd)
    {
        $area_data = $this->db->select('id,code')->from('area')->get()->result_array();
        foreach($area_data as $k=>$v)
        {
            $area_arr[$v['id']] = $v['code'];
        }
        $area_id = array_keys($area_arr,AREA);
        $data=array(
            'uname' => strip_tags($uname),
            'reg_tel' => $reg_tel,
            'password' => think_ucenter_md5($pwd,config_item('USER_AUTH_KEY')),
            'reg_time' => time(),
            'reg_areaid'=> $area_id[0],
            'status' => 1
        );
        $this->db->insert($this->_table_name,$data);
        $uid = $this->db->insert_id();
        return $uid;
    }
    //更新
    public function updateUser($uid,$data) {
        $this->db->where(array('uid'=>$uid))->update($this->_table_name,$data);
        return $this->db->affected_rows();
    }
    //自动登录
    public function autoLogin($uid)
    {
        $user = $this->getUserInfo(array('uid'=>$uid),'uid,uname');
        if(empty($user)){return false;}
        
        $auth = array(
            'uid'          => $user['uid'],
            'uname'        => $user['uname']
        );
        $session_user = array('user_auth'=>$auth);
        $session_user_sign = array('user_auth_sign'=>data_auth_sign($auth));
        $this->session->set_userdata($session_user);
        $this->session->set_userdata($session_user_sign);
        
        //TODO:缓存用户信息
//        $this->redisM->hmset('login_userList',array($user['uid']=>$user['uname']));
        $this->updateLogin($uid);
        //用户设置cookie
        $this->load->model('authmodel','auth');
        $role = $this->auth->checkRole($uid);
        if($role=='guest')
        {
            $value = $user['uid'].'|'.$user['uname'].'|'.getIPaddress();
            set_cookie('login_auto',base64_encode($value),3600*24*5); 
            return $user['uid'];
        }
    }
    //更新登录日期
    protected function updateLogin($uid)
    {
        $data = array(
            'last_login_time' => time()
        );
        $this->db->where(array('uid'=>$uid))
                 ->update($this->_table_name,$data);
    }
    //退出
    public function logout()
    {
        $this->session->unset_userdata('user_auth');
        $this->session->unset_userdata('user_auth_sign');
        $this->session->sess_destroy();
        delete_cookie("login_auto");
    }
}
