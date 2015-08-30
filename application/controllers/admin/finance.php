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
        $where['opublish >'] = mktime(0, 0, 0,6,10,2015);
//        $where['opublish >'] = mktime(0, 0, 0);
        $where['order_status'] = 1;
        $this->load->model('ordermodel','omd');
        $olist = $this->omd->orderList(200,1,$where);
        $data['order_list'] = $olist['data'];
        //
        $this->load->model('shopmodel','smd');
        $swhere['status'] = 1;
        $s_list = $this->smd->shopList(200,1,$swhere);
        $data['shop_list'] = $s_list['data'];
        //
        $this->load->view('admin/finance/meiri',$data);
    }
    //
    public function save_data(){
        if($_POST)
        {
            $order['date']        = $_POST['date'];
            $order['order_num']   = $_POST['order_num'];
            $order['daybook']     = $_POST['daybook'];
            $order['profit']      = $_POST['profit'];
            $order['clerk']       = $_POST['clerk'];
            $order['remark']      = $_POST['remark'];
            $order['alipay']      = $_POST['alipay'];
            $order['hand_in']     = $_POST['shangjiao'];
            $order['j_yue']       = $_POST['jyue'];
            $order['d_yue']       = $_POST['dyue'];
            $order['x_yue']       = $_POST['xyue'];
            $order['m_yue']       = $_POST['myue'];
            $order['submit_time'] = date('Y-m-d H-i',$_SERVER['REQUEST_TIME']);
            $this->db->insert('onethink_finance_history',$order);
            $insert_id = $this->db->insert_id();
            //插入list
            $data= array();
            for($i=0;$i<$_POST['order_num'];$i++)
            {
                $arr = array(
                    'history_id'        =>$insert_id,
                    'lid'               =>$_POST['bianhao'][$i],
                    'shop'              =>$_POST['shop_name'][$i],
                    'pay'               =>$_POST['zf'][$i],
                    'receive'           =>$_POST['sq'][$i],
                    'distribution_fee'  =>$_POST['psf'][$i],
                    'tel'               =>$_POST['dianhua'][$i],
                    'address'           =>$_POST['dizhi'][$i],
                    'distribution_staff'=>$_POST['psy'][$i],
                    'mark'              =>$_POST['beizhu'][$i]
                );
                array_push($data, $arr);
            }
            $res = $this->db->insert_batch('onethink_finance_list',$data);
            echo 'true';
        }
    }
    //
    public function tongji()
    {
        $data = array();
        //当前页码
        $cur_page = $this->uri->segment(5)?$this->uri->segment(5):1;
        $per_page = config_item('admin_per_page');
        //
        $where = array();
        $this->load->model('financemodel','fmd');
        $f_list = $this->fmd->financeList($per_page,$cur_page,$where);
        $total_rows = $f_list['total'];
        $data['list'] = $f_list['data'];
        //分页
        $this->load->library('pagination');
        $config                      = pagination_setting();//加在分页样式
        $config['base_url']          = $_url = '/admin/finance/tongji/page';;
        $config['uri_segment']       = '5'; 
        $config['total_rows']        = $total_rows;
        $config['per_page']          = $per_page;
        $config['page_query_string'] = false;//true为get传参模式，false为url段
        $config['use_page_numbers']  = true;//true当前页数，false当前记录数
        $config['display_pages']     = TRUE;//false隐藏数字连接
        $config['num_links']         = 2;//当前页的前后页显示个数
        $this->pagination->initialize($config);
        $default_output = $this->pagination->create_links();
        $data['page_list'] = $default_output;
        //
        $this->load->view('admin/finance/tongji',$data);
    }
    //
    public function detail()
    {
        $data = array();
        $where['history_id'] = $this->uri->segment(5);
        $list = $this->db->select('*')->from('onethink_finance_list')->where($where)->get()->result_array();
        //
        $data['flist'] = $list;
        $this->load->view('admin/finance/detail',$data);
    }
    //
    public function yuangong()
    {
        $data = array();
        $this->load->view('admin/finance/yuangong',$data);
    }
}
