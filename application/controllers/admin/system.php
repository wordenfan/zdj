<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class System extends AdminBase 
{
    public $data = array();
    function __construct()
    {
        parent::__construct();
		$this->data = $this->db->select('*')->from(config_item('dbprefix').'config')->get()->result_array();
        $res = array();
        //按区域筛选
        foreach($this->data as $k=>$v){
            if(is_numeric(strpos($v['name'],AREA))){
                $res[] = $v;
            }
        }
        $this->data['info_tmp'] = $res;
    }
    //刷新和搜索
    public function conf_other(){
        $this->load->view('admin/system/other',$this->data);
	}
    public function conf()
    {
        $this->load->view('admin/system/conf',$this->data);
    }
}
