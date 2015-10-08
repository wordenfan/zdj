<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    //提示信息
    protected function retrieveJson($status, $data, $errorMsg=''){
        $retrieve = array('status'=>$status, 'data'=>$data, 'msg'=>$errorMsg);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($retrieve);
        exit();
    }
    //
    public function do_login()
    {
        if($_POST)
        {
            if($this->input->post('code')!=$this->session->userdata('yzm')){
                $this->retrieveJson(0,'','验证码输入错误');
            }
            $this->load->model('usermodel','umd');
            $where['uname'] = $this->input->post('uname',true);
            $i_pwd          = $this->input->post('pwd',true);
            $uid = $this->umd->login($where,$i_pwd);//
            if(0 < $uid)
            {
                $this->retrieveJson(1,  base_url('/admin/index/index'), '登录成功');
            }else{
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->retrieveJson(0, '',$error);
            }
        } else {
            $user = $this->session->userdata('user_auth');
            if (!empty($user)) 
            {
                redirect('admin/index/index');
            }
            $data = array();
            $this->load->view('admin/public/login',$data);
        }
    }

    //
    public function do_logout(){
        $this->load->model('usermodel','umd');
        $this->umd->logout();
        redirect('admin/login/do_login');
    }
}
