<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "MobileBase.php";
}

class Home extends MobileBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
        $this->load->model('shopmodel','smd');
    }
    //
    public function index()
    {
		$this->load->library('lib_shoplist','','lib_shoplist');
        //类别
        $data['type_list'] = $this->lib_shoplist->shop_type_list();;
        //
        $cateid = $this->input->get('cateid')?$this->input->get('cateid'):0;
		$all_arr = $this->lib_shoplist->shoplist();
        if($cateid!=0)
        {
            $all_arr_temp = array();
            for($m=0;$m<count($all_arr);$m++)
            {
                if($all_arr[$m]['type']==$cateid)
                {
                    array_push($all_arr_temp,$all_arr[$m]); 
                }
            }
            unset($all_arr);
            $all_arr = $all_arr_temp;
        }
        $data['shop_list'] = $all_arr;
        //排序
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
        $this->load->view('m/index',$data);
    }
}