<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        //设置区域HD
        if(!defined('AREA'))
        {
            define('AREA','HD_');
            define('AREA_ID','1');
        }
        //m站默认跳转
        $url_arr = explode('.', $_SERVER['HTTP_HOST']);
        $m_url = 'm.'.$url_arr[1].'.'.$url_arr[2];
        if(rtrim($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'/') == $m_url){
            redirect('http://'.$_SERVER['HTTP_HOST'].'/home/index');
        }
        $z_url = 'z.'.$url_arr[1].'.'.$url_arr[2];
        if(rtrim($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'/') == $z_url){
            echo '3333';
            redirect('http://'.$_SERVER['HTTP_HOST'].'/order/index');
        }
    }
}