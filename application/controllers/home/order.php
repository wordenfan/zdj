<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
    require_once "HomeBase.php";
}

class Order extends HomeBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('shopmodel','smd');
        $this->load->model('usermodel','umd');
        $this->load->library('shopping','','cart');
        $this->load->library('lib_user','','lib_user');
    }
    //
    public function orderSubmit()
    {
        //未登录跳转
        $uid = $this->login_status();
        if($uid)
        {
            $lib_data = $this->cart->getShopCart(); 
            $_list = $lib_data['all_shop'];
            if(!empty($_list))
            {
                $this->load->library('lib_shop','','lib_shop');
                $shopid_arr = array_keys($_list);//返回所有键值，因为目前是单店模式
                $shopid = $shopid_arr[0];
                //
                $_info = $this->lib_shop->shopDetail(array('id'=>$shopid));
                $_total = $this->cart->getPrice($shopid); 
                $data = array();
                $data['shopname_tmp'] = $_info['name'];
                $data['list_tmp'] = $_list[$shopid];
                $data['shopid_tmp'] = $shopid;
                //
                $udata = $this->lib_user->getUserAllInfoById($uid);
                $data['uid_tmp']            = $udata['base_info']['uid'];
                $data['address_array']      = $udata['address_info'];
                $data['alipay_trade_code']  = $_SERVER['REQUEST_TIME'] . UID;
                $data['sendprc_tmp']        = $_info['send_price'];
                $data['sum']                = $data['sendprc_tmp'] + $_total; 
                
                //是否享受减免配送费
                $in_free_send = $this->lib_shop->freeSend($shopid);
                if($in_free_send && $_total >= config_item(AREA.'FREE_SEND')){
                    $data['sendprc_tmp'] = 0;
                    $data['sum'] = $_total; 
                }
                $this->load->view('home/order/ordersubmit',$data);
            }else{
                show_message('',base_url(),3,'购物车无数据或已过期,访问无效');
            }
        }
    }
    //执行写库命令
    public function dosubmit()
    {   
        $uid = $this->login_status();
        //提交订单
        if($_POST && $uid)
        {
            $this->load->library('lib_order','','lib_order');
            $res_arr = $this->lib_order->doSubmit();
        }else{
            $res_arr['msg'] = '非法提交';
            $res_arr['data'] = 0;
            $res_arr['status'] = 0;
        }
        $json_tm = json_encode($res_arr);
        echo $json_tm;
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
    
    //查看订单信息
    public function orderInfo() 
    {
        //未登录跳转
        $uid = $this->login_status();
        $search_id = $this->uri->segment(5);//oid
        if(isset($search_id)&&!empty($search_id))
        {
            $search_key = strlen($search_id)>6?'oid':'snid';
            $this->load->model('ordermodel','omd');
            $this->load->model('orderlistmodel','olmd');
            $where[$search_key] = $search_id;
            $res = $this->omd->getOrderInfo($where);
            //管理员及客服
            if($this->my_data['role']!='guest')
            {
                $map['uid'] = $res['uid'];
                $this->load->library('lib_user','','lib_user');
                $lib_data = $this->lib_user->getUserAllInfoById($map['uid']);
                $data['userinfo_tmp']  = $lib_data;
                $user_order_data = $this->omd->orderList(3,1,$map);
                $data['userorder_tmp']  = $user_order_data['data'];
            }
            $ldata = $this->olmd->getOrderListInfo(array('snid'=>$res['snid']));
            $res['orderlist'] = $ldata;
            $data['info_tmp'] = $res;
            $data['send_price'] = $res['send_price']; 
            $data['sum'] = $res['osum']; 
            $this->load->view('home/order/orderInfo',$data);
        }
    }
    public function test() {
        $this->load->library('lib_order','','lib_order');
		$this->load->model('orderlistmodel','olmd');
//        log_message('Error', 'nnnotifyurl改变==交易状态');
//        $order_list = $this->lib_order->getOrderList(2,1);
//        var_dump($order_list);
//        exit;
//        $snid = $this->uri->segment(3);
        $snid = 7903;
        
        $order_list = $this->lib_order->getOrderList(1,1,array('snid'=>$snid));
//        $order_data['list']['data'][$k]['oshop_tel'] = explode(';', $order_list[0]['oshop_tel']);
        $food_list = $this->olmd->getOrderListInfo(array('snid'=>$snid));
        
        echo '==========';
        var_dump($snid);
        var_dump($order_list);
        var_dump($food_list);
        exit;
    }
}
