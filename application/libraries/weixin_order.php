<?php 
class Weixin_order
{
	const opendi_fan  = 'oiylOuHVvT7L2fYIQ46SJIwVuN0Q';
	const opendi_chen = 'oiylOuHhaEc-cRE8cgBkveeas94w';
    const AppID       = 'wxa2b35971c5193836';
	const AppSecret   = 'a15953c26f78a991175d2be86336d2bc';
	const TemplateD   = 'pJmonxTzZTTBX72OrkFEIbvLfKuXwSak1EgYllOISJ0';
    const detail_url  = 'http://z.26632.com';
    var $openid_arr = array();

	public function __construct()
	{
        $this->opeid_arr = array(self::opendi_fan,self::opendi_chen);
	}
	
    public function sendOrderMsg($order_data,$list,$snid) {
        $pay_receive = '收：'.$order_data['osum'].'支：'.$order_data['opay'];
        $food_list = '';
        foreach($list as $k=>$v){
            $food_list.='<'.$v['num'].'*'.$v['price']."   ".$v['name'].'>';
        }
        $data = array(
            'first'   =>array('color'=>"#333",'value'=>urlencode($order_data['oshop_name'])),
            'keyword1'=>array('color'=>"#333",'value'=>urlencode($pay_receive)),                                         //订单编号
            'keyword2'=>array('color'=>"#333",'value'=>urlencode($order_data['uname'].' 电话：'.$order_data['otel'])),    //联系信息
            'keyword3'=>array('color'=>'#00008B','value'=>urlencode($food_list)),                                        //订单内容
            'keyword4'=>array('color'=>'#743A3A','value'=>urlencode($order_data['oaddress'])),                           //订单地址
            'keyword5'=>array('color'=>'#333','value'=>urlencode(date('Y-m-d H:i',$_SERVER['REQUEST_TIME']+60*45))),//送达时间
            'remark'  =>array('color'=>'#333','value'=>urlencode($order_data['remark'])),                                //备注
        );
        $url = self::detail_url.'/detail/snid/'.$snid;
        $access_token = $this->getAuthToken(self::AppID,  self::AppSecret);
        //发送消息
        foreach ($this->opeid_arr as $k=>$v){
            $res = $this->doSend($access_token,$v,self::TemplateD,$url,$data);
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
        $dataRes = json_decode($dataRes,true);
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
