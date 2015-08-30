<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if( ! in_array(APPPATH . 'controllers/m/MobileBase.php', get_included_files()) ){
       require "MobileBase.php";
    }
    class Shop extends MobileBase
    {
        var $smd;
        var $fmd;
        var $tmd;
        var $mmd;
        var $cart;//购物车
        
        public function _initialize()
        {
            parent::_initialize();
        }
        //商家店铺
        public function shopinfo()
        {
            $sid =  $this->uri->segment(5);
            if($sid)
            {
                $this->load->library('lib_shopinfo','','lib_shopinfo');
                $info = $this->lib_shopinfo->shopinfo($sid);
                //加载原有物品
//                $_list = $this->cart->getAll($sid);
//                $_list['total'] = $this->cart->getPrice($sid);
//                $food_list = json_encode($_list);
//                $info['shop_cart'] = $food_list;
				//
				$this->load->model('addonsmodel','amd');
				$freeSend_arr = $this->amd->freeSend();
				$info['free_send'] = in_array($info['id'],$freeSend_arr)?1:0;
                //
                if($info['show_type'] == '2'){
                    //：TODO
                    //$this->load->view('m/shop/imgshop',$info);
                }else{
                    $this->load->view('m/shop/shopinfo',$info);
                }
            }else{
                redirect(base_url());
                exit;
            }
        }
        //ajax购物
        public function doShopping()
        {   
            $this->load->library('lib_shopinfo','','lib_shopinfo');
            $json_data = $this->lib_shopinfo->doShopping();
            echo $json_data;
        }
    }