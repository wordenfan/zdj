<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AliPay extends MY_Controller
{
    private $alipay_config;
    public function __construct() 
    {   
        parent::__construct();
    }
    //
    public function doalipay()
    {
        require_once(APPPATH."third_party/alipay/alipay_submit.class.php");
        
        $uid = $this->login_status();
        if($_POST && $uid)
        {
            $this->alipay_config = config_item('alipay_config');
            //支付类型
            $payment_type = "1";
            $notify_url = $this->alipay_config['notify_url'];
            $return_url = $this->alipay_config['return_url'];
            //商户订单号
            $out_trade_no = $_POST['WIDout_trade_no'];
            //商户网站订单系统中唯一订单号，必填
            //订单名称
            $subject = $_POST['WIDsubject'];
            //付款金额
            $total_fee = ENVIRONMENT=="development" ? 0.1 : $_POST['WIDtotal_fee'];
            //订单描述
            $body = $_POST['WIDbody'];
            //商品展示地址
            $show_url = $_POST['WIDshow_url'];
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
                "extra_common_param"=> $_POST['WID_shopid'].','.$_POST['WID_name'].','.$_POST['WID_tel'].','.$_POST['WID_mark'].','.$_POST['WID_address'].','.$_POST['WID_uid'].','.$_POST['WIDout_trade_no'],
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
            log_message('Error', '<====>'.$this->alipay_config['partner']);
            
            $order = new Order();
            $order->dosubmit();
            //建立请求
            $alipaySubmit = new AlipaySubmit($this->alipay_config);
            $html_text = $alipaySubmit->buildRequestForm($parameter,"post", "提交中...");
            echo $html_text;
        }
    }
    function notifyurl()
    {
        include_once APPPATH.'third_party/alipay/alipay_notify.class.php';
        
        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        
        if($verify_result)
        {
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            $trade_no = $_POST['trade_no'];
            $trade_status = $_POST['trade_status'];
            if($_POST['trade_status'] == 'TRADE_FINISHED') {
                //
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                $pcOrderCon = new \Home\Controller\OrderController();
                $pcOrderCon->aliPostOrder(strval($_POST['extra_common_param']),'notify_url');
            }
            echo "success";
        }
        else {
            echo "fail";
        }
    }
    function returnurl()
    {
        include_once APPPATH.'third_party/alipay/alipay_notify.class.php';
        $alipayNotify = new AlipayNotify($this->alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        //验证成功
        if($verify_result) 
        {
            $pcOrderCon = new \Home\Controller\OrderController();
            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];
            //支付宝交易号
            $trade_no = $_GET['trade_no'];
            //交易状态
            $trade_status = $_GET['trade_status'];

            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                $pcOrderCon->aliPostOrder(strval($_GET['extra_common_param']),'return_url');
            }
            else {
                $this->error('支付失败，请返回首页重新提交',__ROOT__);
            }
        }
        else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            $this->error('支付失败，请返回首页重新提交',__ROOT__);
        }
    }
}