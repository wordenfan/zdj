<?php

class Lib_shoplist
{
    private $ci;
    
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('shopmodel','smd');
        $this->ci->load->model('addonsmodel','amd');
    }
    
    //列表
    public function shoplist() 
    {
		//插件
		$freeSend_arr = $this->ci->amd->freeSend();
		//
        $all_temp_arr = $this->ci->smd->shopList(100);
        $all_arr = $all_temp_arr['data'];
        for($i=0; $i<count($all_arr); $i++)
        {
            $flag = get_business_hour($all_arr[$i]['business_hours'],$all_arr[$i]['business_week']);
            $all_arr[$i]['open_close'] = $flag;
			$all_arr[$i]['free_send'] = in_array($all_arr[$i]['id'],$freeSend_arr)?1:0;
        }
		return $all_arr;
    }
	//类别
    public function shop_type_list() 
    {
		$type = $this->ci->db->select('*')->from('onethink_shop_type')->get()->result_array();
		return $type;
	}
}
