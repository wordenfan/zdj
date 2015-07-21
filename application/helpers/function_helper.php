<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//提示信息
function show_message($message='', $url='',$waitSecond = 3,$error = '')
{
    include APPPATH.'errors/show_message.php';
    exit;
}
//系统非常规MD5加密方法
function think_ucenter_md5($str, $key)
{
    return '' === $str ? '' : md5(sha1($str) . $key);
}
//数据签名认证
function data_auth_sign($data) 
{
    if(!is_array($data))
    {
        $data = (array)$data;
    }
    ksort($data); //排序
    $code = http_build_query($data); //url编码并生成query字符串
    $sign = sha1($code); //生成签名 sha1是一种类似md5的加密算法
    return $sign;
}
//获取ip地址
function getIPaddress()
{
    $IPaddress='';
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $IPaddress = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $IPaddress = getenv("HTTP_CLIENT_IP");
        } else {
            $IPaddress = getenv("REMOTE_ADDR");
        }
    }
    return $IPaddress;
}
//检测登录状态
function is_login()
{
    $ci = & get_instance();
    $user = $ci->session->userdata('user_auth');
    if (empty($user)) 
    {
        $cookie_tmp = get_cookie('login_auto');
        if(isset($cookie_tmp) && $cookie_tmp!=NULL)
        {
            $cookie_data = explode('|',base64_decode($cookie_tmp));
            $ip = getIPaddress();
            if($cookie_data[2] == $ip){
                $ci->load->model('userModel','umd');
                return $ci->umd->autoLogin($cookie_data[0]);//cookie存在且数据库能查到
            }else{
                return 0; //cookie存在，但与上次登录地址不一样
            }
        }else{
            return 0; //cookie和session都不存在            
        }
    } else {
        return $ci->session->userdata('user_auth_sign') == data_auth_sign($user) ? $user['uid'] : 0;
    }
}
//营业时间字符串拆解
function get_business_hour($hours,$week)
{
    $opening_week = strpos($week,date('w'));
    if($opening_week===false)
    {
        return 0;//该店周几不营业
    }else{
        $rest = strpos($hours, ';');
        //中间休息
        if($rest)
        {
            $arr0 = (array)explode(';',$hours);
            $arr1 = $arr0[0];
            $arr2 = $arr0[1];
            $arr_01 = explode('-', $arr1);
            $arr_02 = explode('-', $arr2);
            $result1 = check_opening($arr_01[0], $arr_01[1]);
            $result2 = check_opening($arr_02[0], $arr_02[1]);
            if($result1||$result2)
            {
                $result = 1;//open
            }else{
                $result = 0;//close
            }
        }
        //无中间休息时间
        else{
            $arr = explode('-', $hours);
            $result = check_opening($arr[0], $arr[1]);
        }
        return $result;
    }
}
//检查是否营业
//参数格式 $start 9:00
//参数格式 $end  21:00
function check_opening($start,$end)
{
    date_default_timezone_set("PRC");
    $send_arr = explode('-',  config_item(AREA.'SERVICE_TIME'));
    $cur_tm = time();
    //营业时间
    $shop_a = getHourMinute($start);
    $shop_b = getHourMinute($end);
    $shop_tma = mktime($shop_a[0],$shop_a[1],0);//商店开门时间
    $shop_tmb = mktime($shop_b[0],$shop_b[1],0);//商店打烊时间
    //配送时间
    $send_a = getHourMinute($send_arr[0]);
    $send_b = getHourMinute($send_arr[1]);
    $send_tma = mktime($send_a[0],$send_a[1],0);//开始下单时间
    $send_tmb = mktime($send_b[0],$send_b[1],0);//停止下单时间
    //
    $start_max = max($shop_tma,$send_tma);
    $end_min = min($shop_tmb,$send_tmb);
    if($cur_tm>$start_max&&$cur_tm<$end_min)
    {
        return 1;
    }else{
        return 0;
    }
}
//获得小时、分钟的数组
function getHourMinute($tm_str)
{
    $tp_arr = array();
    $tp_arr = explode(':',$tm_str);
    $_arr[0] = intval($tp_arr[0]);
    $_arr[1] = intval($tp_arr[1]);
    return $_arr;
}