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
        if($_POST){
            foreach($_POST as $k=>$v){
                if($k == 'title'){
                    $where['name'] = AREA.'SITE_TITLE';
                }else if($k == 'summary'){
                    $where['name'] = AREA.'SITE_DESCRIPTION';
                }else if($k == 'keyword'){
                    $where['name'] = AREA.'SITE_KEYWORD';
                }else if($k == 'bussiness_hour'){
                    $where['name'] = AREA.'SERVICE_TIME';
                }else if($k == 'tel'){
                    $where['name'] = AREA.'SERVICE_PHONE';
                }else if($k == 'area'){
                    $where['name'] = AREA.'SERVICE_AREA';
                }
                $data['value'] = $v;
                $this->db->where($where)->update(config_item('dbprefix').'config',$data);
            }
            $retrieve = array('status'=>1, 'data'=>'', 'msg'=>'更改成功');
            echo json_encode($retrieve);
            exit();
        }else{
            $this->load->view('admin/system/other',$this->data);
        }
	}
    public function conf()
    {
        if($_POST){
            foreach($_POST as $k=>$v){
                if($k == 'announce'){
                    $where['name'] = AREA.'ANNOUNCEMENT_MODE';
                }else if($k == 'announcement'){
                    $where['name'] = AREA.'ANNOUNCEMENT';
                }else if($k == 'stop_receive'){
                    $where['name'] = AREA.'SITE_CLOSE';
                }
                $data['value'] = $v;
                $this->db->where($where)->update(config_item('dbprefix').'config',$data);
            }
            $retrieve = array('status'=>1, 'data'=>'', 'msg'=>'更改成功');
            echo json_encode($retrieve);
            exit();
        }else{
            $this->load->view('admin/system/conf',$this->data);
        }
    }
}
