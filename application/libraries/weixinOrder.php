<?php 
class WeixinOrder
{
	const opendi_fan  = 'oiylOuHVvT7L2fYIQ46SJIwVuN0Q';
	const opendi_chen = 'oiylOuHhaEc-cRE8cgBkveeas94w';
    const AppID       = 'wxa2b35971c5193836';
	const AppSecret   = 'a15953c26f78a991175d2be86336d2bc';
	const TemplateD   = 'pJmonxTzZTTBX72OrkFEIbvLfKuXwSak1EgYllOISJ0';
    var $openid_arr = array();

	public function __construct()
	{
        $this->opeid_arr = array(self::opendi_fan,self::opendi_chen);
	}
	
    public function sendOrderMsg($body_data) {
        $order = $body_data['order'];
        $shop  = $body_data['shop'];
        $list  = $body_data['foodlist'];
        $pay_receive = '收：支：';
        $food_list = '';
        foreach($list as $k=>$v){
            $food_list.=$v['num'].'*'.$v['price']."   ".$v['name'].'<br>';
        }
        $data = array(
            'first'=>array('value'=>urlencode($shop['name']."来新订单了"),'color'=>"#743A3A"),
            'keyword1'=>array('value'=>urlencode("订单编号01"),'color'=>"#743A3A"),//订单编号
            'keyword2'=>array('value'=>urlencode($order['ord_name'].' : '.$order['ord_tel']),'color'=>'#00008B'),//联系信息
            'keyword3'=>array('value'=>urlencode($food_list),'color'=>'#00008B'),
            'keyword4'=>array('value'=>urlencode($order['ord_address']),'color'=>'#00008B'),//订单地址
            'keyword5'=>array('value'=>urlencode('送达时间05'),'color'=>'#00008B'),//送达时间
            'remark'=>array('value'=>urlencode($order['ord_remark']),'color'=>'#00008B'),//备注
        );
        $url = 'http://z.26632.com';
        $access_token = $this->getAuthToken(self::AppID,  self::AppSecret);
        //发送消息
        foreach ($this->opeid_arr as $k=>$v){
            $res = $this->doSend($access_token,$openid,self::TemplateD,$url,$data);
        }
    }
    private function getAuthToken($AppID, $AppSecret){
        $get_token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$AppID."&secret=".$AppSecret;
        $output = $this->https_post($get_token_url);

        $jsoninfo = json_decode($output, true);
        return $jsoninfo["access_token"];
    }

    private function doSend($access_token,$touser, $template_id, $url, $data, $topcolor = '#7B68EE')
    {
        $template = array(
                 'touser' => $touser,
                 'template_id' => $template_id,
                 'url' => $url,
                 'topcolor' => $topcolor,
                 'data' => $data
        );
        $json_template = json_encode($template);

        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=" . $access_token;
        $dataRes = $this->https_post($url,urldecode($json_template));
        if ($dataRes['errcode'] == 0) {
                 return true;
        } else {
                 return false;
        }
    }
    private function https_post($url,$data=null){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        if(!empty($data)){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
    
    //授权获取openid,将该链接发送给微信,点击跳转到weixin_callback.php
    //<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa2b35971c5193836&redirect_uri=http://www.26632.com/weixin_callback.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect">点击这里体验</a>
    //$CODE为授权后跳转到该方法时可以通过$_GET['code']方法获取,该方法返回的access_token可能不准
    private function getOpenid($AppID, $AppSecret,$CODE)
    {
        $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$AppID.'&secret='.$AppSecret.'&code='.$CODE.'&grant_type=authorization_code';
        $output = $this->https_post($get_token_url);

        $jsoninfo = json_decode($output, true);
        $openid = $jsoninfo["openid"];
        $access_token = $jsoninfo["access_token"];

        return $jsoninfo["openid"];
    }

}
?>