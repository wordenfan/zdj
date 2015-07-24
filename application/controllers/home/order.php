<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('shopmodel','smd');
        $this->load->model('usermodel','umd');
        $this->load->model('authmodel','auth');
        $this->load->library('shopping','','cart');
    }
    //
    public function orderSubmit()
    {
        if(UID)
        {
            if(get_cookie('cart'))
            {
                $_list = $this->cart->getAll('all'); 
                $shopid_arr = array_keys($_list);//返回所有键值，因为目前是单店模式
                $shopid = $shopid_arr[0];
                $_list = $this->cart->getAll($shopid); 
                $_info = $this->smd->getShop(array('id'=>$shopid));
                $_total = $this->cart->getPrice($shopid); 
                $data = array();
                $data['shopname_tmp'] = $_info['name'];
                $data['sendprc_tmp'] = $_info['send_price'];
                $data['list_tmp'] = $_list;
                $data['food_sum'] = $_total;
                $data['shopid_tmp'] = $shopid;
                //
                $uwhere['uid'] = UID; 
                $udata = $this->umd->getUserInfo($uwhere,'uid,uname,tel,address');
                $data['uid_tmp'] = $udata['uid'];
                $data['name_tmp'] = $udata['uname'];
                $data['tel_tmp'] = $udata['tel'];
                $data['address_tmp'] = $udata['address'];
                //通过插件计算
                $par['shop_id'] = $shopid;
                $par['send_prc'] = $_info['send_price'];
                $par['food_sum'] = $_total;
                //$rarr = \Addons\FreeSend\FreeSendAddon::countSendPrc($par);
                $data['sendprc_tmp'] = 100;
                $data['sum'] = 100;
                $data['alipay_trade_code'] = $_SERVER['REQUEST_TIME'] . UID;
//                                now()time()
                $this->load->view('home/order/ordersubmit',$data);
            }else{
                show_message('',base_url(),3,'购物车无数据,访问无效');
            }
        }
    }
    //重置购物车
    public function resetCart()
    {
        $shopid =  $this->uri->segment(5);
        if(!$shopid || empty($shopid))
        {
            redirect(base_url());
        }else{
            redirect(base_url('/home/shop/shopinfo/id/'.$shopid));
        }
    }
}