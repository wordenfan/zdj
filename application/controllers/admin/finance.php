<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class Finance extends AdminBase 
{
    var $ormd;//
    
    function __construct()
    {
        parent::__construct();
    }
    public function meiri()
    {
        $data = array();
        $this->load->view('admin/finance/meiri',$data);
    }
    //
    public function tongji()
    {
        $data = array();
        $this->load->view('admin/finance/tongji',$data);
    }
    //
    public function yuangong()
    {
        $data = array();
        $this->load->view('admin/finance/yuangong',$data);
    }
}
