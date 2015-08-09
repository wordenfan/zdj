<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class User extends AdminBase 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel','umd');
    }
    //刷新和搜索
    public function ulist()
    {
        $data = array();
		
	//当前页码
        $cur_page = $this->uri->segment(5)?$this->uri->segment(5):1;
        $per_page = config_item('admin_per_page');
        
        //查询
        if($this->uri->segment(7)){
            $js_type = $this->uri->segment(5);
            $js_condition = $this->uri->segment(7);
            $where[$js_type] = $js_condition;
            $total_rows = $this->umd->selectUserInfo(2,$where);
            $order_list = $this->umd->selectUserInfo(1,$where,'*',$per_page,$cur_page);
            $_url = '/admin/user/ulist/'.$js_type.'/'.$js_condition.'/page/'.$cur_page;
        }else{
            //总记录数
            $total_rows = $this->umd->selectUserInfo(2,array());
            $order_list = $this->umd->selectUserInfo(1,array(),'*',$per_page,$cur_page);
            $_url = '/admin/user/ulist/page';
        }
        $data['info_tmp'] = $order_list;

        //分页
        $this->load->library('pagination');
        $config                      = pagination_setting();//加在分页样式
        $config['base_url']          = $_url;
        $config['uri_segment']       = '5'; 
        $config['total_rows']        = $total_rows;
        $config['per_page']          = $per_page;
        $config['page_query_string'] = false;//true为get传参模式，false为url段
        $config['use_page_numbers']  = true;//true当前页数，false当前记录数
        $config['display_pages']     = TRUE;//false隐藏数字连接
        $config['num_links']         = 2;//当前页的前后页显示个数
        $this->pagination->initialize($config);
        $default_output = $this->pagination->create_links();
        $add_putput = "<ul class='pagination' style='float: right;font-size:20px;font-weight: bold;'><li>共 $total_rows 条记录</li></ul>";
        //
        $data['page_list'] = $default_output.$add_putput;
		
        $this->load->view('admin/user/list',$data);
    }
}
