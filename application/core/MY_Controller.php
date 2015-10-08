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
//            define('AREA','SN_');
//            define('AREA_ID','2');
        }
    }
}