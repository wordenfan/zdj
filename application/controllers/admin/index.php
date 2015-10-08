<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class Index extends AdminBase 
{
    
    public function __construct()
    {
        parent::__construct();
    }
    //
    public function index()
    {
        $tdata = array();
        $this->load->view('admin/index',$tdata);
    }
    //
    public function ad_top()
    {
        $tdata = array();
        $this->load->view('admin/public/top',$tdata);
    }
    //
    public function ad_menu()
    {
        $tdata = array();
        $this->load->view('admin/public/menu',$tdata);
    }
}
