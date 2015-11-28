<?php

class Lib_order
{
    private $ci;
    
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('shopping','','lib_cart');
        $this->ci->load->library('lib_shop','','lib_shop');
    }
	/*
     *如果是aiipay的则返回$alipay_post继续支付
     *如果是pc的则返回提示语言
     */
    public function doSubmit() 
    {
        $this->ci->load->model('foodmodel','fmd');
        
		$from_type = $this->ci->input->post('from_type') ? $this->ci->input->post('from_type'):0;
        if(!$from_type || !$_POST){ 
            $res_arr['msg'] = '订单来源错误';
            $res_arr['data'] = 0;
            $res_arr['status'] = 0;
            return $res_arr; 
        }
        //
        $res_arr = array();
        $data = array();
        switch ($from_type){
            case 'pc_alipay' :
                $data['shop_id']    = $this->ci->input->post('WID_shopid');
                $data['ord_name']   = $this->ci->input->post('WID_name');
                $data['ord_tel']    = $this->ci->input->post('WID_tel');
                $data['ord_address']= $this->ci->input->post('WID_address');
                $data['ord_remark'] = $this->ci->input->post('WID_mark');
                //
                $alipay_post = array();
                $alipay_post['WIDout_trade_no'] = $this->ci->input->post('WIDout_trade_no');
                $alipay_post['WIDsubject']      = $this->ci->input->post('WIDsubject');
                $alipay_post['WIDtotal_fee']    = $this->ci->input->post('WIDtotal_fee');
                $alipay_post['WIDbody']         = $this->ci->input->post('WIDbody');
                $alipay_post['WIDshow_url']     = $this->ci->input->post('WIDshow_url');
                $data['pay_status'] = 2;
                break;;
            case 'pc_home' :
                $data['shop_id']    = $this->ci->input->post('shopid');
                $data['ord_name']   = $this->ci->input->post('add_uname');
                $data['ord_tel']    = $this->ci->input->post('tel');
                $data['ord_address']= $this->ci->input->post('address');
                $data['ord_remark'] = $this->ci->input->post('remark');
                $data['pay_status'] = 0;
                break;
            case 'mobile_home' :
                $data['shop_id']    = $this->ci->input->post('shopid');
                $data['ord_name']   = $this->ci->input->post('add_uname');
                $data['ord_tel']    = $this->ci->input->post('tel');
                $data['ord_address']= $this->ci->input->post('address');
                $data['ord_remark'] = $this->ci->input->post('remark');
                $data['pay_status'] = 0;
                break;
        }
        //
        $shop_id    =  $data['shop_id'];
        $shop_info  =  $this->ci->lib_shop->shopDetail(array('id'=>$shop_id));
        $open_close =  get_business_hour($shop_info['business_hours'],$shop_info['business_week']);
        if($open_close==0)
        {
            $res_arr['msg'] = '不巧，店家或配送员刚刚下班';
            $res_arr['data'] = 0;
            $res_arr['status'] = 0;
            return $res_arr; 
        }
        if($this->ci->lib_cart->getShopNum()<1)
        {
            $res_arr['msg'] = '购物车为空';
            $res_arr['data'] = 0;
            $res_arr['status'] = 0;
            return $res_arr; 
        }
        //计算总额
        $lib_data = $this->ci->lib_cart->getShopCart($shop_id);
        $list = $lib_data['cur_shop'];
        $data['sum_real'] = 0;
        $where['status'] = 1;
        $all_food = $this->ci->fmd->selectFoodList($shop_id,$where);
        foreach($list as $key=>$val)
        {
            for($i=0;$i<count($all_food);$i++)
            {
                if(intval($all_food[$i]['id'])===$key)
                {
                    $data['sum_real']+=$all_food[$i]['get_price']*$list[$key]['num'];
                }
            }
        }
        //
        $res_arr = $this->add_order($data,$shop_info,$list);
        if($res_arr['status'] == 1)
        {
            $this->ci->lib_cart->clearCart();
            //支付宝继续执行
            if(!empty($alipay_post)){
                require_once  APPPATH.'controllers/home/alipay.php';
                $alipay = new AliPay();
                $alipay->doalipay($alipay_post);
                exit;
            }
        }
        return $res_arr; 
	}
    
    //插入order和order_list表
    private function add_order($order_info,$shop_info,$food_list) 
    {
        $this->ci->load->model('ordermodel','omd');
        $this->ci->load->library('lib_user','','lib_user');
        
        $shop_id = $order_info['shop_id'];
        $_total  = $this->ci->lib_cart->getPrice($shop_id);
        
        //只能先插入order表
        $data['oname']      = $order_info['ord_name'];
        $data['otel']       = $order_info['ord_tel'];
        $data['oaddress']   = $order_info['ord_address'];
        $data['remark']     = $order_info['ord_remark'];
        $data['pay_status'] = $order_info['pay_status'];
        $data['oshop_id']   = $shop_id;
        $data['osum_real']  = $order_info['sum_real'];
        $data['opay']       = $order_info['sum_real']*$shop_info['discount'];
        $data['oip']        = getIPaddress();
        //是否享受减免配送费
        $data['osum']       = $shop_info['send_price'] + $_total;
        $data['send_price'] = $shop_info['send_price'];
        $in_free_send       = $this->ci->lib_shop->freeSend($shop_id);
        if($in_free_send && $_total >= config_item(AREA.'FREE_SEND')){
            $data['osum'] = $_total; 
            $data['send_price'] = 0;
        }
        //
        $data['oshop_name']        = $shop_info['name'];
        $data['oshop_tel']         = $shop_info['telephone'];
        $data['oshop_address']     = $shop_info['address'];
        $data['uid']               = $this->ci->my_data['myinfo']['uid'];
        $data['uname']             = $this->ci->my_data['myinfo']['uname'];
        $data['opublish']          = $_SERVER['REQUEST_TIME'];
        $data['oid']               = order_id_generate();
        $data['alipay_trade_code'] = $this->ci->input->post('WIDout_trade_no')?$this->ci->input->post('WIDout_trade_no'):0;
        $data['user_status']       = $this->ci->lib_user->getUserStatus(array('uid'=>$data['uid']));
        $this->ci->lib_user->addUserOld($data['uid'],$data['uname'],$data['osum']);
        $snid = $this->ci->omd->addOrder($data);
        if(!$snid){
            $res['msg'] = '插入order失败';
            $res['data'] = 0;
            $res['status'] = 0;
            return $res;
        }
        $arr=array();
        foreach($food_list as $key=>$val)
        {
            $ar = array("snid"=>$snid,"fid"=>$key,"fname"=>$food_list[$key]['name'],"fprice"=>$food_list[$key]['price'],"fnum"=>$food_list[$key]['num']);
            array_push($arr, $ar);
        }
        $this->ci->db->insert_batch('order_list',$arr);
        $affected_rows = $this->ci->db->affected_rows();
        if(!$affected_rows) {
            $res['msg'] = '批量插入orderlist失败';
            $res['data'] = 0;
            $res['status'] = 0;
            return $res;
        }
        $res['msg'] = '订单提交成功,配送员即刻为您配送!';
        $res['data'] = array('snid'=>$snid);
        $res['status'] = 1;
        
        //可以改为异步发送微信订单通知
        $this->ci->load->library('weixin_order','','lib_weixin');
        $this->ci->lib_weixin->sendOrderMsg($data,$food_list,$data['oid']);
        //sendWeixin(APPPATH.'controllers/common/weixinorder.php',$data);

        return $res;
    }
    //
    public function getOrderList($limit = 20, $offset = 1, $where=array(),$like=array()) {
        $this->ci->load->model('ordermodel','omd');
        return $this->ci->omd->orderList($limit,$offset,$where,$like);
    }
    //修改订单状态
    public function changeOrderStatus($oid,$data) {
        $this->ci->load->model('ordermodel','omd');
        $order_md = $this->ci->omd->changeOrderStatus($oid,$data);
        
        $this->ci->load->model('redismodel','redis_m');
        $this->ci->redis_m->lrem($oid);
        return $order_md;
    }
}
