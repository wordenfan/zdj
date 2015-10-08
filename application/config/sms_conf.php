<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//主帐号,对应开官网发者主账号下的 ACCOUNT SID
$config['accountSid'] = '8a48b5514b0b8727014b1f6582770db0';

//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
$config['accountToken']= '8e8cd44f7aac4f59842d0c901365d354';

//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
$config['appId']= '8a48b5514b0b8727014b1fc998600dff';

//请求地址
//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
//生产环境（用户应用上线使用）：app.cloopen.com
$config['serverIP']='sandboxapp.cloopen.com';


//请求端口，生产环境和沙盒环境一致
$config['serverPort']='8883';

//REST版本号，在官网文档REST介绍中获得。
$config['softVersion']='2013-12-26';

