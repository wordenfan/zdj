<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if( ! in_array(APPPATH . 'controllers/m/MobileBase.php', get_included_files()) ){
       require "MobileBase.php";
    }
    class Shop extends MobileBase
    {
        
        public function __construct() {
            parent::__construct();
            $this->load->library('shopping','','lib_cart');
        }
        //商家店铺
        public function shopinfo()
        {
            $sid =  $this->uri->segment(5);
            if($sid)
            {
                $this->load->library('lib_shop','','lib_shop');
                $info = $this->lib_shop->shopinfo($sid);
                //加载原有物品
                $lib_data = $this->lib_cart->getShopCart($sid);
                $_list = $lib_data['cur_shop'];
                $_list['total'] = $this->lib_cart->getPrice($sid);
                $info['shop_cart'] = json_encode($_list);
				$info['free_send'] = $this->lib_shop->freeSend($sid);
                //
                if($info['show_type'] == '2'){
                    //：TODO
                    //$this->load->view('m/shop/imgshop',$info);
                }else{
                    $this->load->view('m/shop/shopinfo',$info);
                }
            }else{
                redirect('http://'.$_SERVER['HTTP_HOST']);
                exit;
            }
        }
        //ajax购物
        public function doShopping()
        {   
            $this->load->library('lib_shop','','lib_shop');
            $json_data = $this->lib_shop->doShopping();
            echo $json_data;
        }
    }