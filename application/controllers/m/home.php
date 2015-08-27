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
        //店铺
        $all_temp_arr = $this->smd->shopList(100);
        $all_arr = $all_temp_arr['data'];
        for($i=0; $i<count($all_arr); $i++)
        {
            $flag = get_business_hour($all_arr[$i]['business_hours'],$all_arr[$i]['business_week']);
            $all_arr[$i]['open_close'] = $flag;
        }
        //类别
        $type = $this->db->select('*')->from('onethink_shop_type')->get()->result_array();
        $data['type_list'] = $type;
        //
        $cateid = $this->input->get('cateid')?$this->input->get('cateid'):0;
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
//        var_dump($data['shop_list']);
        $this->load->view('m/index',$data);
    }
}