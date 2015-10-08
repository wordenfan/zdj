<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if( ! in_array(APPPATH . 'controllers/m/MobileBase.php', get_included_files()) ){
       require "MobileBase.php";
    }
    class Order extends MobileBase
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
        public function index()
        {
            $this->load->model('shopmodel','smd');
            $this->load->library('shopping','','cart');
            
            //未登录跳转
            $uid = $this->login_status();
            if($uid)
            {
                $lib_data = $this->cart->getShopCart(); 
                $_list = $lib_data['all_shop'];
                if(!empty($_list))
                {
                    $this->load->library('lib_shop','','lib_shop');
                    $this->load->library('lib_user','','lib_user');
                    $shopid_arr = array_keys($_list);//返回所有键值，因为目前是单店模式
                    $shopid = $shopid_arr[0];
                    $_info = $this->lib_shop->shopDetail(array('id'=>$shopid));
                    $_total = $this->cart->getPrice($shopid); 

                    $data = array();
                    $data['shopname_tmp'] = $_info['name'];
                    $data['list_tmp'] = $_list[$shopid];
                    $data['shopid_tmp'] = $shopid;
                    //
                    $udata = $this->lib_user->getUserAllInfoById($uid);
                    $data['uid_tmp']           = $udata['base_info']['uid'];
                    $data['alipay_trade_code'] = $_SERVER['REQUEST_TIME'] . UID;
                    $data['sendprc_tmp']       = $_info['send_price'];
                    $data['sum']               = $data['sendprc_tmp'] + $_total; 
                    $data['address_array']     = $udata['address_info'];
                    //是否享受减免配送费
                    $in_free_send = $this->lib_shop->freeSend($shopid);
                    if($in_free_send && $_total >= config_item(AREA.'FREE_SEND')){
                        $data['sendprc_tmp'] = 0;
                        $data['sum'] = $_total; 
                    }
                    $this->load->view('m/order/ordersubmit',$data);
                }else{
                    redirect(base_url());
                    exit;
                }
            }
        }
        //同home的dosubmit
        public function dosubmit()
        {
            $uid = $this->login_status();
            //提交订单
            if($_POST && $uid)
            {
                $this->load->library('lib_order','','lib_order');
                $res_arr = $this->lib_order->doSubmit();
                if($res_arr['status'] == 1)
                {
                    $this->load->library('cachedata','','cachedata');
                    $this->cachedata->saveCache();
                }
            }
            $json_tm = json_encode($res_arr);
            echo $json_tm;
        }
        
        //查看订单信息
        public function orderInfo() 
        {
            $this->load->library('lib_order','','lib_order');
            
            $uid = $this->login_status();
            $apidata = $this->lib_order->getOrderList(10,1,array('uid'=>$uid));
            $this->load->view('m/order/orderInfo',$apidata);
        }
        //下单成功/下单失败
        public function orderStatus()
        {
            $status = $this->input->get('st');
            $msg = $this->input->get('msg');
            if($status&&$msg)
            {
                $apidata['status']  = $status;
                $apidata['msg']     = $msg;
                $this->load->view('m/order/orderStatus',$apidata);
            }
        }
    }