<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('shopmodel','smd');
        $this->load->model('usermodel','umd');
        $this->load->library('shopping','','cart');
    }
    //
    public function orderSubmit()
    {
        //未登录跳转
        $uid = $this->login_status();
        if($uid)
        {
            $_list = $this->cart->getAll('all'); 
            if(get_cookie('cart') && $_list)
            {
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
                $this->load->view('home/order/ordersubmit',$data);
            }else{
                show_message('',base_url(),3,'购物车无数据,访问无效');
            }
        }
    }
    //执行写库命令
    public function dosubmit($alipay_mobile_pc=NULL)
    {
        //判断pc还是mobiel还是alipay
        if(is_string($alipay_mobile_pc))
        {
            //            
        }
        else if(is_array($alipay_mobile_pc))
        {
            $shop_id = $alipay_mobile_pc[0];
            $ord_name = $alipay_mobile_pc[1];
            $ord_tel = $alipay_mobile_pc[2];
            $ord_address = $alipay_mobile_pc[4];
            $ord_remark = $alipay_mobile_pc[3];
            $ord_pay_status = 0;
        }else{
            $shop_id = $this->input->post('shopid');
            $ord_name = $this->input->post('name');
            $ord_tel = $this->input->post('tel');
            $ord_address = $this->input->post('address');
            $ord_remark = $this->input->post('remark');
            $ord_pay_status = 0;
        }
        //检查是否登录
        //未登录跳转
        $uid = $this->login_status();
        if($uid)
        {
            $shop_info = $this->smd->getShop(array('id'=>$shop_id));
            $open_close = get_business_hour($shop_info['business_hours'],$shop_info['business_week']);
            $res_arr = array();
            if($open_close==0)
            {
                $res_arr['msg'] = '不巧，店家或配送员刚刚下班';
                $res_arr['flag'] = 'false';
            }else{
                if($this->cart->getShopNum()>0)
                {
                    $list = $this->cart->getAll($shop_id);
                    //计算支付总价
                    $arr=array();
                    $sum_real = 0;
                    $this->load->model('foodmodel','fmd');
                    $where['shopid'] = $shop_id;
                    $all_food = $this->fmd->getFoodList($where);
                    foreach($list as $key=>$val)
                    {
                        for($i=0;$i<count($all_food);$i++)
                        {
                            if(intval($all_food[$i]['id'])===$key)
                            {
                                $sum_real+=$all_food[$i]['get_price']*$list[$key]['num'];
                            }
                        }
                    }
                    //收入总计
//                    $param['shop_id'] = $shop_id;
//                    $param['food_sum'] = $this->cart->getPrice($shop_id);
//                    $param['send_prc'] = $shop_info['send_price'];
//                    $addon_arr = \Addons\FreeSend\FreeSendAddon::countSendPrc($param);
                    //只能先插入order表
                    $data['osum_real'] = $sum_real;
                    $data['opay'] = $sum_real*$shop_info['discount'];
                    $data['osum'] = 100;
                    $data['send_price'] = 100;
//                    $data['osum'] = $addon_arr['sum'];
                    $data['oname'] = $ord_name;
                    $data['otel'] = $ord_tel;
                    $data['oaddress'] = $ord_address;
                    $data['remark'] = $ord_remark;
                    $data['pay_status'] = $ord_pay_status;
                    $data['oip'] = getIPaddress();
                    $data['oshop_id'] = $shop_id;
                    $data['oshop_name'] = $shop_info['name'];
                    $data['oshop_tel'] = $shop_info['telephone'];
                    $data['oshop_address'] = $shop_info['address'];
                    $data['uid'] = $this->my_data['myinfo']['uid'];
                    $data['uname'] = $this->my_data['myinfo']['uname'];
                    $data['opublish'] = $_SERVER['REQUEST_TIME'];
                    $data['oid'] = order_id_generate();
                    $this->load->model('ordermodel','omd');
                    $this->load->model('useroldmodel','uomd');
                    $data['user_status'] = $this->uomd->addInfo($data['uid'],$data['uname'],$data['osum']);//是否是新用户                
                    $snid = $this->omd->addOrder($data);
                    //批量插入orderlist
                    if($snid){
                        foreach($list as $key=>$val){
                            $ar = array("snid"=>$snid,"fid"=>$key,"fname"=>$list[$key]['name'],"fprice"=>$list[$key]['price'],"fnum"=>$list[$key]['num']);
                            array_push($arr, $ar);
                        }
                        $res = $this->db->insert_batch('order_list',$arr);
                    }else{
                        $res_arr = $this->hasError(010,'order');
                    }
                    //
                    if($res){
                        $res_arr['msg'] = '订单提交成功，请保持电话畅通，配送员即刻为您配送';
                        $res_arr['flag'] = 'true';
                        //待改为redis缓存
                        $this->load->library('cachedata','','cachedata');
                        $this->cachedata->saveCache();
                    }else{
                        $res_arr = $this->hasError(011,'order');
                    }
                }else{
                    $res_arr = $this->hasError(012,'order');
                }
            }
        }
        //
        if(is_string($alipay_mobile_pc))//alipay
        {
            //
        }
        else if(is_array($alipay_mobile_pc))//mobile
        {
            $json_tm = json_encode($res_arr);
            return $json_tm;
        }else{//pc
            $json_tm = json_encode($res_arr);
            echo $json_tm;
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
    //查看订单信息
    public function orderInfo() 
    {
        //未登录跳转
        $uid = $this->login_status();
        $oid = $this->uri->segment(5);
        if(isset($oid)&&!empty($oid))
        {
            $this->load->model('ordermodel','omd');
            $this->load->model('orderlistmodel','olmd');
            $where['oid'] = $oid;
            $res = $this->omd->getOrderInfo($where);
            //管理员及客服
            if($this->my_data['role']!='guest')
            {
                $map['uid'] = $res['uid'];
                $user_data = $this->umd->getUserInfo($map,'mark_address,mark_info');
                $data['userinfo_tmp']  = $user_data;
                $user_order_data = $this->omd->getOrderInfo($map);
                $data['userorder_tmp']  = $user_order_data;
            }
            $ldata = $this->olmd->getOrderListInfo(array('snid'=>$res['snid']));
            $res['orderlist'] = $ldata;
            $data['info_tmp'] = $res;
            $data['send_price'] = $res['send_price']; 
            $data['sum'] = $res['osum']; 
            $this->load->view('home/order/orderInfo',$data);
        }
    }
    //
    public function hasError($errorCode,$control='order')
    {
        switch ($errorCode)
        {
            case 010://order表写入失败
                $res_arr['msg'] = '网络繁忙，订单提交失败';
                $res_arr['flag'] = 'false';
                $this->cart->clearCart();
                break;
            case 011://order写入成功，orderlist表写入失败
                $res_arr['msg'] = '网络繁忙，订单提交失败';
                $res_arr['flag'] = 'false';
                $this->cart->clearCart();
                break;
            case 012://购物车无数据
                $res_arr['msg'] = '网络繁忙，订单提交失败';
                $res_arr['flag'] = 'false';
                $this->cart->clearCart();
                break;
        }
        log_message('Error', '错误代码123'.$errorCode.'=/='.$this->db->last_query());
    }
    
    public function test() {
        $mic_data = explode(' ', microtime());
        var_dump($mic_data[1]);
//        $data = 11;
        var_dump(rand(1,9));
    }
}