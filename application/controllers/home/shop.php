<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "HomeBase.php";
}
        
class Shop extends HomeBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
        $this->load->model('shopmodel','smd');
        $this->load->model('foodmodel','fmd');
        $this->load->library('shopping','','cart');
    }
    //ajax购物
    public function doShopping()
    {
        if($_POST)
        {
            $_sid = (int)$this->input->post('sid',true);
            $_id = (int)$this->input->post('fid',true);
            $_mod = (int)$this->input->post('fmod',true);
            $_sendprc = $this->input->post('send_price',true);
            switch ($_mod)
            {
                case 1://增加
                    $_price = $this->input->post('fprice',true);
                    $_name = trim($this->input->post('fname',true));
                    $_type = $this->input->post('ftype',true);
                    $this->cart->addItem($_sid,$_id,$_name,$_price,$_type);
                    break;
                case 2://减去
                    $this->cart->decItem($_sid,$_id);
                    break;
                case 3://移除
                    $this->cart->delItem($_sid,$_id);
                    break;
            }
            $_list = $this->cart->getAll($_sid);
            $_list['total'] = $this->cart->getPrice($_sid);//最终合计价格
            $food_list = json_encode($_list);
            echo $food_list;
        }
    }
    //
    public function shopinfo()
    {
        $sid =  $this->uri->segment(5);
        $info = $this->smd->getShop(array('id'=>$sid));
        if($info)
        {
            //加载原有物品
            $_list = $this->cart->getAll($sid);
            $_list['total'] = $this->cart->getPrice($sid);
            $food_list = json_encode($_list);
            $info['shop_cart'] = $food_list;
            //
            $open_flag = get_business_hour($info['business_hours'],$info['business_week']);
            $info['open_close'] = $open_flag;
            //类别
            $type = $this->fmd->getFoodType(array('shopid'=>$sid));
            $where['status'] = 1;
            $list = $this->fmd->selectFoodList($sid,$where);
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
                        $tarr['food_price'] = $jv['price'];
                        $tarr['food_pic'] = $jv['pic'];
                        array_push($parr, $tarr);
                    }
                }
                $data['food_list'] = $parr;
                array_push($result_arr, $data);
            }
            $info['foodlist_tmp'] = $result_arr;
            $this->load->view('home/shop/shopinfo',$info);
        }else{
            redirect(base_url());
            exit;
        }
    }
    
}