<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['alipay_config'] = array(
    'partner'      => '2088901033852207',
    'key'          => 'ul8vb8qmi1giqr7cow620kbycz3bg4mx',
    'seller_email' => 'mbyd123@126.com',
    'sign_type'    => strtoupper('MD5'),
    'input_charset'=> strtolower('utf-8'),
    'cacert'       => getcwd().'\\cacert.pem',
    'transport'    => 'http',
    'notify_url'   => 'http://'.$_SERVER['HTTP_HOST'].'/order/callback/notify',
    'return_url'   => 'http://'.$_SERVER['HTTP_HOST'].'/order/callback/return',
);