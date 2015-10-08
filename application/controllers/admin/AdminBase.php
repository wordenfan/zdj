<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminBase extends MY_Controller
{
    public $Auth;
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('authmodel','auth');
        $this->load->model('usermodel','umd');
        $this->_initialize();
    }
            
    protected function _initialize()
    {
        // 获取当前用户ID
        define('UID',is_login());
        if( !UID ){
            echo "<script type='text/javascript'>window.location.href='/admin/login/do_login'</script>";
            exit();
        }else{
            $this->my_data['role'] = $this->auth->checkRole(UID);
            $this->my_data['myinfo'] = $this->session->userdata('user_auth');
        }
        $this->load->vars($this->my_data);
        if($this->my_data['role']!='admin'){
            $this->umd->logout();
            show_message('403:禁止访问',base_url('admin/login/do_login'),3,'非管理员禁止访问');
        }
    }
}