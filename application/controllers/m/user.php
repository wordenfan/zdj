<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "MobileBase.php";
}

class User extends MobileBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
    }
    //
    public function add_address()
    {
        $data = array();
        $this->load->view('m/user/add_address',$data);
    }
}