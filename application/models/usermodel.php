<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */

class UserModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'user'; 
        $this->load->model('redismodel','redisM');
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
    public function login($username, $pwd)
    {
        $map = array();
        $map['uname'] = $username;
        //验证用户密码
        $user = $this->getUserInfo($map,'uid,uname,password,status');
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
    public function addUser($uname,$pwd)
    {
        $area_data = $this->db->select('id,code')->from('area')->get()->result_array();
        foreach($area_data as $k=>$v)
        {
            $area_arr[$v['id']] = $v['code'];
        }
        $area_id = array_keys($area_arr,AREA);
        $data=array(
            'uname' => strip_tags($uname),
            'password' => think_ucenter_md5($pwd,config_item('USER_AUTH_KEY')),
            'reg_time' => time(),
            'reg_areaid'=> $area_id[0],
            'status' => 1
        );
        $this->db->insert($this->_table_name,$data);
        $uid = $this->db->insert_id();
        return $uid;
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
        var_dump($this->my_data);
        exit;
        $this->load->model('authmodel','auth');
        $role = $this->authList->checkRole($uid);
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
