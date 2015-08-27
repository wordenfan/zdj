<?php

class Lib_shopinfo 
{
    private $ci;
    
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('usermodel','umd');
        $this->ci->load->model('shopmodel','smd');
        $this->ci->load->model('foodmodel','fmd');
//        $this->load->library('shopping','','cart');
    }
    
    /*
    * 通过shop_id获取商家信息、菜单列表
    */
    public function shopinfo($shop_id) 
    {
        $shop_detail = array();
        if($shop_id)
        {
            $sid = $shop_id;
            //商家信息
            $shop_detail = $this->ci->smd->getShop(array('id'=>$sid));
            $shop_detail['open_close'] = get_business_hour($shop_detail['business_hours'],$shop_detail['business_week']);
            //类别
            $type = $this->ci->fmd->getFoodType(array('shopid'=>$sid));
            $where['status'] = 1;
            $list = $this->ci->fmd->selectFoodList($sid,$where);
            //整理数组
            $result_arr = array();
            foreach($type as $ik=>$iv)
            {
                $data = array();
                $data['type_id'] = $iv['id'];
                $data['type_name'] = $iv['type_name'];
                $parr = array();
                foreach($list as $jk=>$jv)
                {
                    if($iv['id'] == $jv['food_type'])
                    {
                        $tarr = array();
                        $tarr['food_id'] = $jv['id'];
                        $tarr['food_name'] = $jv['name'];
                        $tarr['food_price'] = $jv['sale_price'];
                        $tarr['food_get_price'] = $jv['get_price'];
                        $tarr['food_origin_price'] = $jv['original_price'];
                        $tarr['food_pic'] = $jv['pic'];
                        array_push($parr, $tarr);
                    }
                }
                $data['food_list'] = $parr;
                array_push($result_arr, $data);
            }
            $shop_detail['foodlist_tmp'] = $result_arr;
        }
        return $shop_detail;
    }
}
