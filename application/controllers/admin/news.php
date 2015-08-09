<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class News extends AdminBase 
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('newsmodel','nmd');
    }
    //刷新和搜索
    public function nlist()
    {
        $data = array();
        $data['info_tmp'] = array();
		
        $this->load->view('admin/news/list',$data);
    }
}
