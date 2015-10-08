<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MobileBase extends MY_Controller
{
    public $my_data = array();
    function __construct()
    {
        parent::__construct();
        $this->load->model('authmodel','auth');
        $this->my_init();
    }
    
    public function my_init()
    {
        //获取当前用户ID
        if(!defined('UID'))
        {
            define('UID',is_login());
        }
        //用户信息
        if (UID) {
            $this->my_data['role'] = $this->auth->checkRole(UID);
            $this->my_data['myinfo'] = $this->session->userdata('user_auth');
        }
        $this->my_data['login_status'] = UID;
        $this->load->vars($this->my_data);
        //读取config表
        if(!$this->config->item('WEB_ICP')){
            $config_data = $this->db->select('name,value,status')->from('config')->get()->result_array();
            foreach($config_data as $key=>$val)
            {
                if($val['status']==1){
                    $this->config->set_item($val['name'],$val['value']);
                }
            }
        }
        //站点状态
        if(!$this->config->item(AREA.'SITE_CLOSE')){
            //TODO:站点关闭
            show_message('',base_url(),3,'站点关闭，暂停访问');
            exit();
        }
    }
    //未登陆跳转
    public function login_status()
    {
        if(UID)
        {
            return UID;
        }else{
            show_message('',base_url(),3,'请登录后访问');
            exit();
        }
    }
    //提示信息
    protected function retrieveJson($status, $data, $errorMsg=''){
        $retrieve = array('status'=>$status, 'data'=>$data, 'msg'=>$errorMsg);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($retrieve);
        exit();
    }
}