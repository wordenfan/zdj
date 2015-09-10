<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require_once "HomeBase.php";
}

class AliPay extends HomeBase
{
    private $alipay_config;
    public function __construct() 
    {   
        parent::__construct();
        $this->alipay_config = config_item('alipay_config');
    }
    //
    public function doalipay($post_arr)
    {
        echo '==========$$$';
        require_once(APPPATH."third_party/alipay/alipay_submit.class.php");
        
        $uid = $this->login_status();
        if(is_array($post_arr) && $uid)
        {
            //支付类型
            $payment_type = "1";
            $qr_pay_mode = 2;//跳转支付
            $notify_url = $this->alipay_config['notify_url'];
            $return_url = $this->alipay_config['return_url'];
            //商户订单号
            $out_trade_no = $post_arr['WIDout_trade_no'];
            //商户网站订单系统中唯一订单号，必填
            //订单名称
            $subject = $post_arr['WIDsubject'];
            //付款金额
            $total_fee = ENVIRONMENT=="development" ? 0.01 : $post_arr['WIDtotal_fee'];
            //订单描述
            $body = $post_arr['WIDbody'];
            //商品展示地址
            $show_url = $post_arr['WIDshow_url'];
            //防钓鱼时间戳
            $anti_phishing_key = "";
            //若要使用请调用类文件submit中的query_timestamp函数
            //客户端的IP地址
            $exter_invoke_ip = getIPaddress();
            //非局域网的外网IP地址，如：221.0.0.1

            //构造要请求的参数数组，无需改动
            $parameter = array(
                "service" => "create_direct_pay_by_user",
                "partner" => $this->alipay_config['partner'],
                "seller_email" => $this->alipay_config['seller_email'],
                "payment_type"	=> $payment_type,
                "qr_pay_mode"	=> $qr_pay_mode,
                "notify_url"	=> $notify_url,
                "return_url"	=> $return_url,
                "out_trade_no"	=> $out_trade_no,
                "subject"	=> $subject,
                "total_fee"	=> $total_fee,
                "body"	=> $body,
                "show_url"	=> $show_url,
                "anti_phishing_key"	=> $anti_phishing_key,
                "exter_invoke_ip"	=> $exter_invoke_ip,
                "_input_charset"	=> $this->alipay_config['input_charset'],
//                "extra_common_param"=> $_POST['WID_shopid'].','.$_POST['WID_name'].','.$_POST['WID_tel'].','.$_POST['WID_mark'].','.$_POST['WID_address'].','.$_POST['WID_uid'].','.$_POST['WIDout_trade_no'],
            );
//            //该缓存只是为了解决支付宝的notify回调无法调用cookie的问题
//            $cache_data = cookie('cart');
//            if($cache_data)
//            {
//                S('ali_cart',$cache_data,array('type'=>'file','length'=>10,'expire'=>300));
//            }
//            //先从客户端删除cookie等
//            $this->cart = new Shopping();
//            $this->cart->clearCart();
            
            var_dump($parameter);exit
            //建立请求
            $alipaySubmit = new AlipaySubmit($this->alipay_config);
            $html_text = $alipaySubmit->buildRequestForm($parameter,"post", "提交中...");
            
            echo $html_text;
        }
    }
    public function notifyurl()
    { 
        log_message('Error', '==notifyurl=======01');
        require_once APPPATH.'third_party/alipay/alipay_notify.class.php';
        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        log_message('Error', 'notifyurl改变==交易状态0');
        if($verify_result)
        {
            log_message('Error', 'notifyurl改变==交易状态1');
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            $trade_no = $_POST['trade_no'];
            $trade_status = $_POST['trade_status'];
            if($_POST['trade_status'] == 'TRADE_FINISHED'||$_POST['trade_status'] == 'TRADE_SUCCESS') {
                log_message('Error', 'notifyurl改变==交易状态2');
                $this->load->model('ordermodel','omd');
                //订单状态未修改则修改
                if(!$this->omd->checkPayStatus($out_trade_no)){
                    log_message('Error', 'notifyurl改变==交易状态3');
                    $this->omd->changePayStatus($out_trade_no);
                }
            }
            echo "success";
        }
        else {
            echo "fail";
        }
    }
    public function returnurl()
    {   
        log_message('Error', 'returnurl====0');
        require_once APPPATH.'third_party/alipay/alipay_notify.class.php';
        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        //验证成功
        if($verify_result) 
        {
            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_GET['trade_no'];
            //交易状态
            $trade_status = $_GET['trade_status'];
            //支付成功跳转到我的订单列表
            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                $this->load->model('ordermodel','omd');
                $this->omd->changePayStatus($out_trade_no);
                redirect(base_url('home/user/myorder'));
            }
            else {
                log_message('Error', '支付失败01:交易状态：'.$trade_status);
                show_message('',base_url(),3,'支付失败1，请返回首页重新提交');
                exit();
            }
        }
        else {
            //验证失败
            log_message('Error', '支付失败02:验证结果：'.$verify_result);
            show_message('',base_url(),3,'支付失败2，请返回首页重新提交');
            exit();
        }
    }
}