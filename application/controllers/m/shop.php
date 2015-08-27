<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
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
            $this->smd = new ShopModel();
            $this->umd = new UcenterMemberModel();
            $this->cart = new Shopping();
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
                if($info['show_type'] == '2'){
                    //：TODO
                    //$this->load->view('m/shop/imgshop',$info);
                }else{
                    var_dump($info['food_list']);exit;
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
            if(IS_POST)
            {
                $_sid = I('post.sid');
                $_id = I('post.fid');
                $_mod = I('post.fmod');
                $_sendprc = I('post.send_price');
                switch ($_mod)
                {
                    case 1://增加
                        $_price = I('post.fprice');
                        $_name = trim(I('post.fname'));
                        $_type = I('post.ftype');
                        $this->cart->addItem($_sid,$_id,$_name,$_price,$_type);
                        break;
                    case 2://减去
                        $this->cart->decItem($_sid,$_id);
                        break;
                }
                $_list = $this->cart->getAll($_sid);
                $_list['total'] = $this->cart->getPrice($_sid);//最终合计价格
                $food_list = json_encode($_list);
                echo $food_list;
            }
        }
    }