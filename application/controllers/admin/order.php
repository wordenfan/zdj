<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class Order extends AdminBase 
{
    var $ormd;//
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('ordermodel','omd');
    }
    //刷新和搜索
    public function olist()
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
            $total_rows = $this->omd->selectOrderInfo(2,$where);
            $order_list = $this->omd->selectOrderInfo(1,$where,'*',$per_page,$cur_page);
            $_url = '/admin/order/olist/'.$js_type.'/'.$js_condition.'/page/'.$cur_page;
        }else{
            //每次刷新都会清空redis的list
            $this->load->model('redismodel','redis_m');
            $this->redis_m->del('order');
            //总记录数
            $total_rows = $this->omd->selectOrderInfo(2,array());
            $order_list = $this->omd->selectOrderInfo(1,array(),'*',$per_page,$cur_page);
            $_url = '/admin/order/olist/page';
        }
        $data['order_list'] = $order_list;
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
        $this->load->view('admin/order/list',$data);
    }
    //ajax刷新
    public function refreshOrder()
    {
        if($_POST)
        {           
            $this->load->model('redismodel','redis_m');
            $new_order = $this->redis_m->llen('order');
            $flag = intval($new_order)>0?'new':'old';
            
            $_json = json_encode($flag);
            echo $_json;
        }
    }
    public function operate()
    {
        if(isset($_GET['oid'])&&isset($_GET['stu']))
        {
            $data['status'] = $_GET['stu'];
            $res = $this->ormd->where('oid='.$_GET['oid'])->save($data);
            CacheData::reset_order_cache();
            if($res)
            {
                $this->redirect(MODULE_ALIAS.'/Admin/Order/index');
            }else{
                $this->error($this->ormd->getError());
            }
        }
    }
    //
    public function ad_index()
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
