<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['partner']       = '2088901033852207';
$config['key']           = 'ul8vb8qmi1giqr7cow620kbycz3bg4mx';
$config['seller_email']  = 'mbyd123@126.com';
$config['sign_type']     = strtoupper('MD5');
$config['input_charset'] = strtolower('utf-8');
$config['cacert']        = getcwd().'\\cacert.pem';
$config['transport']     = 'http';
$config['notify_url']    = 'http://'.$_SERVER['HTTP_HOST'].'/order/callback/notify';
$config['return_url']    = 'http://'.$_SERVER['HTTP_HOST'].'/order/callback/return';