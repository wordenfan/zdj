<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "HomeBase.php";
}

class Home extends HomeBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
        $this->load->model('shopmodel','smd');
    }
    public function index()
    {
        if($_POST)//ajax登录
        {
            $i_keyword = $this->input->post('keyword',true);
            if(strlen($i_keyword) == 11 && intval($i_keyword)!=0){
                $where['reg_tel'] = intval($i_keyword);
            }else{
                $where['uname'] = trim($i_keyword);
            }
            $i_pwd   = $this->input->post('pwd',true);
            $uid = $this->umd->login($where,$i_pwd);
            if(0 < $uid)
            {
                $uinfo = $this->session->userdata('user_auth');
                $this->retrieveJson(1,$uinfo['uname'],'登陆成功');
            }else{
                $this->retrieveJson(0,'','登陆失败');
            }
        }else{
			$this->load->library('lib_shoplist','','lib_shoplist');
            $all_arr = $this->lib_shoplist->shoplist();
            $open_arr = array();
            $close_arr = array();
            for($i=0; $i<count($all_arr); $i++)
            {
                if($all_arr[$i]['open_close']==1)
                {
                    array_push($open_arr, $all_arr[$i]);
                }else{
                    array_push($close_arr, $all_arr[$i]);
                }
            }
            $data['open_list'] = $open_arr;
            $data['close_list'] = $close_arr;
            
            //新闻公告
            $data['news'] = $this->db->select('id,title')->from('news')->order_by('id desc')->get()->result_array();
            $this->load->view('home/index',$data);
        }
    }
    //导表
    public function inserertSql(){
        $this->load->helper('database');
        inserertSql();
    }
    
}


