<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "HomeBase.php";
}

class Group extends HomeBase {

    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $data = array();
        $this->load->view('home/group/index',$data);
    }
}


