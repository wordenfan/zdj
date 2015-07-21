<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();
    function __construct()
    {
        parent::__construct();
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
        $data['login_status'] = UID;
        if (UID) {
            $data['myinfo'] = $this->session->userdata('user_auth');
        }
        $this->load->vars($data);
        //设置区域HD
        if(!defined('AREA'))
        {
            define('AREA','HD_');
        }
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
}