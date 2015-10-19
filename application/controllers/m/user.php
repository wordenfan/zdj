<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "MobileBase.php";
}

class User extends MobileBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
    }
    //
    public function manage_address()
    {
        $this->load->library('lib_user','','lib_user');
        //未登录跳转
        $uid = $this->login_status();
        $udata = $this->lib_user->getUserAllInfoById($uid);
        $data['uid_tmp']            = $udata['base_info']['uid'];
        $data['address_array']      = $udata['address_info'];
        $this->load->view('m/user/manage_address',$data);
    }
    //
    public function add_address()
    {
        $this->load->library('lib_user','','lib_user');
        //未登录跳转
        $uid = $this->login_status();
        if($_POST){
            $new_data['uid']        = $uid;
            $new_data['add_uname']  = $this->input->post('add_uname');
            $new_data['tel']        = $this->input->post('tel');
            $new_data['address']    = $this->input->post('address');
            $insert_id = $this->lib_user->addAddress($uid,$new_data);
            if($insert_id){
                $json = array('status'=>1,'msg'=>'成功');
            }else{
                $json = array('status'=>0,'msg'=>'失败');
            }
            echo json_encode($json);
        }else{
            $udata = $this->lib_user->getUserAllInfoById($uid);
            $data['uid_tmp']            = $uid;
            $data['address_array']      = $udata['address_info'];
            $this->load->view('m/user/add_address',$data);
        }
        
    }

    //注册
    public function register()
    {
        if($_POST)
        {
            $data = $this->regParams();
            $uid = $this->umd->addUser($data['uname'],$data['reg_tel'], $data['password']);
            if(0 < $uid)
            {
                $this->umd->autoLogin($uid);
                $this->retrieveJson(1,'http://'.$_SERVER['HTTP_HOST'],'注册成功');
            } else {
                $this->retrieveJson(0,'','注册失败');
            }
        }
        else {
            $data = array();
            $this->load->view('m/user/register',$data);
        }
    }
    //登陆
    public function login()
    {
        if($_POST)
        {
            $req_url = isset($_GET['req_url'])?$_GET['req_url']:'http://'.$_SERVER['HTTP_HOST'];
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
                $from=='shopinfo' ? echo_json(array('flag'=>'1','msg'=>'登陆成功')) : show_message('登录成功!',$req_url);
            }else{
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用'; break; //用户不存在或被禁用！，系统级别禁用
                    case -2: $error = '用户名或密码错误'; break;//密码错误！
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $from=='shopinfo' ? echo_json(array('flag'=>'0','msg'=>$error)) : show_message('','http://'.$_SERVER['HTTP_HOST'].'/user/login',3,$error);
            }
        }
        else {
            $data = array();
            $this->load->view('m/user/login',$data);
        }
    }
    //
    public function regParams() {
        $tel_code         = $this->input->post('tel_code',TRUE);
        $data['reg_tel']  = $this->input->post('reg_tel',TRUE);
        $data['password'] = $this->input->post('password',TRUE);
        $data['uname']    = '用户'.substr($data['reg_tel'], 7);
        $session_code = $this->session->userdata['reg_code'];
        if($tel_code != $session_code[0]){
            $this->retrieveJson(0,'','手机验证码错误');
        }
        $this->session->unset_userdata('reg_code');
        return $data;
    }
}