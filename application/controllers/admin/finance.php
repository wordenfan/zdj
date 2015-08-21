<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class Finance extends AdminBase 
{
    var $ormd;//
    
    function __construct()
    {
        parent::__construct();
    }
    public function meiri()
    {
        $data = array();
        $where['opublish >'] = mktime(0, 0, 0,6,10,2015);
//        $where['opublish >'] = mktime(0, 0, 0);
        $where['order_status'] = 1;
        $this->load->model('ordermodel','omd');
        $olist = $this->omd->orderList(200,1,$where);
        $data['order_list'] = $olist['data'];
        //
        $this->load->model('shopmodel','smd');
        $s_list = $this->smd->shopList();
        $data['shop_list'] = $s_list['data'];
        //
//        var_dump($data);exit;
        $this->load->view('admin/finance/meiri',$data);
    }
    //
    public function tongji()
    {
        $data = array();
        $this->load->view('admin/finance/tongji',$data);
    }
    //
    public function yuangong()
    {
        $data = array();
        $this->load->view('admin/finance/yuangong',$data);
    }
}
