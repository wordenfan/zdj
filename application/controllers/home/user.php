<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "HomeBase.php";
}

class User extends HomeBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
    }
    //
    public function register()
    {
        if($_POST)
        {
            $data = $this->regParams();
            $uid = $this->umd->addUser($data['uname'],$data['reg_tel'], $data['password']);
            if(0 < $uid)
            {
                $this->umd->autoLogin($uid);
                $this->retrieveJson(1,base_url(),'注册成功');
            } else {
                $this->retrieveJson(0,'','注册失败');
            }
        }
        else {
            $this->load->view('home/user/register');
        }
    }
    /*
     * 登录
     * $from='shopinfo'/'login'
     * shop页则返回json,login页直接跳转
     */
    public function login()
    {
        if($_POST)
        {
            $req_url = isset($_GET['req_url'])?$_GET['req_url']:base_url();
            
            $i_keyword = $this->input->post('keyword',true);
            if(strlen($i_keyword) == 11 && intval($i_keyword)!=0){
                $where['reg_tel'] = intval($i_keyword);
            }else{
                $where['uname'] = trim($i_keyword);
            }
            $i_pwd   = $this->input->post('pwd',true);
            $from    = $this->input->post('frompage',true);
            $uid = $this->umd->login($where,$i_pwd);//
            if(0 < $uid)
            {
                $user = $ci->session->userdata('user_auth');
                echo '====###';
    var_dump($user);
    var_dump(get_cookie('login_auto'));
                $from=='shopinfo' ? echo_json(array('flag'=>'1','msg'=>'登陆成功')) : show_message('登录成功!',$req_url);
            }else{
                switch($uid) {
                    case -1: $error = '用户名或密码错误'; break; //用户不存在或被禁用！，系统级别禁用
                    case -2: $error = '用户名或密码错误'; break;//密码错误！
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $from=='shopinfo' ? echo_json(array('flag'=>'0','msg'=>$error)) : show_message('',base_url('home/user/login'),3,$error);
            }
        }else {
            $data['send_area'] = $this->config->item(AREA.'SERVICE_AREA');
            $this->load->view('home/user/login',$data);
        }
    }
    //退出
    public function logout()
    {
        if(UID)
        {
            $this->umd->logout();
        }
        redirect('home/user/login');
    }
    //用户名校验
    public function check_uname()
    {
        $uname = $this->input->post('uname');
        if($_POST && $uname)
        {
            $data = $this->umd->getUserInfo(array('uname'=>$uname),'uname');
            if(!$data){
                echo 'false';
            } else{
                echo 'true';
            }
        }
    }
    
    //验证码校验
    public function check_captcha()
    {
        $captcha = $this->input->post('regcode');
        if($_POST && $captcha)
        {
            if($this->session->userdata('home_reg_yzm')!=strtolower($captcha)){
                $this->retrieveJson(0,'','图片验证码错误');
            } else{
                $this->retrieveJson(1,'','匹配成功');
            }
        }
    }
    //个人中心
    public function pcenter()
    {
        if($_POST)
        {
            $uid = $this->input->post('uid');
            $data['sex'] = $this->input->post('usex');
            $data['age'] = $this->input->post('uage');
            $this->db->where('uid',$uid)->update('user',$data);
            if($this->db->affected_rows() === false){
                $ajax_data = array('status'=>0,'data'=>'信息更新失败');
            }
            $info = array('ajax_sex'=>$data['sex'],'ajax_age'=>$data['age']);
            $ajax_data = array('status'=>1,'data'=>$info);
            echo json_encode($ajax_data);
        }else{
            $uid = $this->login_status();$this->load->library('lib_user','','lib_user');
            $data = $this->lib_user->getUserBaseInfoById($uid);
            
            $this->load->view('home/user/pcenter',$data);
        }
    }
    //地址 
    public function address()
    {
        if($_POST)//ajax
        {
            $address_id         = $this->input->post('address_id',true);
            $tel                = trim($this->input->post('tel',true));
            $address            = trim($this->input->post('address',true));
            $add_uname          = trim($this->input->post('add_uname',true));
            $data['tel']        = $tel;
            $data['address']    = $address;
            $data['add_uname']   = $add_uname;
            $this->db->where('id',$address_id)->update('user_address',$data);
            if($this->db->affected_rows() === false){
                $ajax_data = array('status'=>0,'data'=>'地址更新失败');
            }
            $info = array('ajax_tel'=>$tel,'ajax_address'=>$address,'ajax_add_uname'=>$add_uname);
            $ajax_data = array('status'=>1,'data'=>$info);
            echo json_encode($ajax_data);
        }else{
            $uid = $this->login_status();
            $this->load->library('lib_user','','lib_user');
            $lib_data = $this->lib_user->getUserAllInfoById($uid);
            $data['address_arr'] = $lib_data['address_info'];
            $this->load->view('home/user/address',$data);
        }
    }
    //MyOrder
    public function myorder()
    {
        $uid = $this->login_status();
        $this->load->library('lib_order','','lib_order');
        $apidata = $this->lib_order->getOrderList(10,1,array('uid'=>UID));
        
        $this->load->view('home/user/myorder',$apidata);
    }
    
    //
    public function add_address() {
        $uid = $this->login_status();
        $res = array();
        if($_POST){
            $data['id'] = $this->input->post('id');
            $data['add_uname'] = trim($this->input->post('add_uname',true));
            $data['tel'] = trim($this->input->post('tel',true));
            $data['address'] = trim($this->input->post('address',true));
            
            $this->load->library('lib_user','','lib_user');
            if($data['id'] == 0){
                unset($data['id']);
                $data['uid'] = $uid;
                $insert_id = $this->lib_user->addAddress($uid,$data);
                $res_id = $insert_id;
            }else{
                $affected_rows = $this->lib_user->updateAddress($data['id'],$data);
                $res_id = $affected_rows;
            }
            
            if($res_id){
                $res['status'] = 1;
                $res['data'] = $res_id;
            }else{
                $res['status'] = 0;
                $res['msg'] = '插入失败';
            }
        }else{
            $res['status'] = 0;
            $res['msg'] = '非法请求';
        }
        echo json_encode($res);
    }
    //
    public function del_address() {
        $uid = $this->login_status();
        $res = array();
        if($_POST){
            $data['id'] = $this->input->post('id');
            $this->load->library('lib_user','','lib_user');
            $affected_rows = $this->lib_user->delAddress($data['id']);
            if($affected_rows){
                $res['status'] = 1;
                $res['data'] = $affected_rows;
            }else{
                $res['status'] = 0;
                $res['msg'] = '插入失败';
            }
        }else{
            $res['status'] = 0;
            $res['msg'] = '非法请求';
        }
        echo json_encode($res);
    }
    //
    public function set_default_address() {
        $uid = $this->login_status();
        $res = array();
        if($_POST){
            $data['id'] = $this->input->post('id');
            $this->load->library('lib_user','','lib_user');
            $affected_rows = $this->lib_user->setDefaultAddress($uid,$data['id']);
            if($affected_rows!==false){
                $res['status'] = 1;
                $res['data'] = $affected_rows;
            }else{
                $res['status'] = 0;
                $res['msg'] = '设置默认失败';
            }
        }else{
            $res['status'] = 0;
            $res['msg'] = '非法请求';
        }
        echo json_encode($res);
    }
    //
    public function regParams() {
        $tel_code         = $this->input->post('tel_code',TRUE);
        $data['reg_tel']  = $this->input->post('reg_tel',TRUE);
        $data['password'] = $this->input->post('password',TRUE);
        $data['uname']    = '用户'.substr($data['reg_tel'], 7);
        $session_code = isset($this->session->userdata['reg_code'])?$this->session->userdata['reg_code']:'';
        if(!isset($session_code[0]) && $tel_code != $session_code[0]){
            $this->retrieveJson(0,'','手机验证码错误');
        }
        $this->session->unset_userdata('reg_code');
        return $data;
    }
}