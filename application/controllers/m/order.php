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
            $this->load->library('lib_shopinfo','','lib_shopinfo');
            
            //
            if($_POST && !empty($this->cart->getAll()))
            {
                $shopid = $this->input->post('o_shopid',true);
                $_info = $this->lib_shopinfo->shopinfo($shopid);
                $_list = $this->cart->getAll($shopid); 
                $_total = $this->cart->getPrice($shopid); 
                
                $odata = array();
                $odata['shopname_tmp'] = $_info['name'];
                $odata['sendprc_tmp'] = $_info['send_price'];
                $odata['list_tmp'] = $_list;
                $odata['food_sum'] = $_total;
                $odata['shopid_tmp'] = $shopid;
                //
                $odata['user_address'] = '测试地址一';
                $odata['user_tel'] = '1528888888';
                //通过插件计算
                $this->load->model('addonsmodel','amd');
				$freeSend_arr = $this->amd->freeSend();
				$odata['sendprc_tmp'] = in_array($shopid,$freeSend_arr)?0:$_info['send_price'];
                $odata['sum'] = 0;
                foreach($odata['list_tmp'] as $k=>$v){
                    $odata['sum']+= $odata['list_tmp'][$k]['num']*$odata['list_tmp'][$k]['price'];
                }
                $this->load->view('m/order/orderinfo',$odata);
            }else{
                redirect(base_url());
                exit;
            }
        }
    }