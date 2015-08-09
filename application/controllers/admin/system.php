<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class System extends AdminBase 
{
    function __construct()
    {
        parent::__construct();
    }
    //刷新和搜索
    public function conf_other(){
		$data = array();
		
        $this->load->view('admin/system/other',$data);
	}
    public function conf()
    {
        $data = array();
		
        $this->load->view('admin/system/conf',$data);
    }
}
