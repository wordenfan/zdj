<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files())) {
    require "AdminBase.php";
}

class Shop extends AdminBase {

    function __construct() {
        parent::__construct();
        $this->load->model('shopmodel', 'smd');
    }

    //刷新和搜索
    public function slist() {
        $data = array();
        //当前页码
        $cur_page = $this->uri->segment(5) ? $this->uri->segment(5) : 1;
        $per_page = config_item('admin_per_page');

        //查询
        $where = array();
        $where['status'] = 1;
        if ($this->uri->segment(7)) {
            $js_type = $this->uri->segment(5);
            $js_condition = $this->uri->segment(7);
            $where[$js_type] = $js_condition;
            $_url = '/admin/shop/slist/' . $js_type . '/' . $js_condition . '/page/' . $cur_page;
        } else {
            $_url = '/admin/shop/slist/page';
        }
        $s_list = $this->smd->shopList($per_page,$cur_page,$where);
        $total_rows = $s_list['total'];
        $data['info_tmp'] = $s_list['data'];
        //分页
        $this->load->library('pagination');
        $config = pagination_setting(); //加在分页样式
        $config['base_url'] = $_url;
        $config['uri_segment'] = '5';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['page_query_string'] = false; //true为get传参模式，false为url段
        $config['use_page_numbers'] = true; //true当前页数，false当前记录数
        $config['display_pages'] = TRUE; //false隐藏数字连接
        $config['num_links'] = 2; //当前页的前后页显示个数
        $this->pagination->initialize($config);
        $default_output = $this->pagination->create_links();
        $add_putput = "<ul class='pagination' style='float: right;font-size:20px;font-weight: bold;'><li>共 $total_rows 条记录</li></ul>";
        //
        $data['page_list'] = $default_output . $add_putput;
        $this->load->view('admin/shop/list', $data);
    }

    //添加商店
    public function addshop() {
        if ($_POST) {
            $add_data['name'] = $this->input->post('shop_name');
            $add_data['type'] = $this->input->post('shop_type');
            $add_data['address'] = $this->input->post('shop_address');
            $add_data['business_hours'] = $this->input->post('shop_business_hour');
            $add_data['area_id'] = $this->input->post('shop_area_id');
            $add_data['start_price'] = $this->input->post('shop_start_price');
            $add_data['send_price'] = $this->input->post('shop_send_price');
            $add_data['telephone'] = $this->input->post('shop_tel');
            $add_data['summary'] = $this->input->post('shop_summary');
            $add_data['sort'] = $this->input->post('shop_sort');
            $res = $this->smd->insert($add_data);
            if ($res) {
                redirect('admin/shop/slist');
            } else {
                echo '添加商家数据错误!';
            }
        } else {
            $data = array();
            $area_data = $this->db->select('*')->from('area')->get()->result_array();
            $data['shop_area'] = $area_data;
            $data['food_type'] = array();
            $data['food_list'] = array();
            $data['shop_type'] = config_item('shop_type');
            $this->load->view('admin/shop/addshop', $data);
        }
    }

    //编辑商店
    public function editshop() {
        $this->load->library('lib_shop','','lib_shop');
        if($_POST){
            $shop_id = $this->input->post('shop_id');
            $add_data['name'] = $this->input->post('shop_name');
            $add_data['telephone'] = $this->input->post('shop_tel');
            $add_data['summary'] = $this->input->post('shop_summary');
            $add_data['address'] = $this->input->post('shop_address');
            $add_data['type'] = $this->input->post('shop_type');
            $add_data['business_hours'] = $this->input->post('shop_business_hour');
            $add_data['area_id'] = $this->input->post('shop_area_id');
            $add_data['start_price'] = $this->input->post('shop_start_price');
            $add_data['send_price'] = $this->input->post('shop_send_price');
            $add_data['sort'] = $this->input->post('shop_sort');
            $res = $this->lib_shop->shopUpdate($shop_id,$add_data);
            if ($res!==false) {
                redirect('admin/shop/slist');
            } else {
                echo '更新商家数据错误!';
            }
        }else{
            $sid = $this->uri->segment(5) ? $this->uri->segment(5) : 1;
            $info = $this->lib_shop->shopDetail(array('id' => $sid));
            $data['info'] = $info;
            $data['shop_name'] = $info['name'];
            //
            $map['shopid'] = $sid;
            $data['food_type'] = $this->db->select('*')->from('food_type')->where($map)->get()->result_array();
            $data['food_list'] = $this->db->select('*')->from('food')->where($map)->order_by('publish','DESC')->get()->result_array();
            $data['shop_area'] = $this->db->select('*')->from('area')->get()->result_array();
            $data['shop_type'] = config_item('shop_type');
            $data['shop_id'] = $sid;
            //获取type_name
            $type_arr = array();
            foreach ($data['food_type'] as $k => $v) {
                $type_arr[$v['id']] = $v['type_name'];
            }
            $data['type_name'] = $type_arr;

            $this->load->view('admin/shop/editshop', $data);
        }
    }

    //商店营业状态更新
    public function doajax() {
        $sid = $this->input->post('shop_id');
        $status = $this->input->post('to_status');
        $where['id'] = $sid;
        $data['status'] = $status;
        $this->smd->update($data, $where);
    }

    //添加菜品类型
    public function add_food_type() {
        $data['shopid'] = $this->input->post('shop_id');
        $data['type_name'] = $this->input->post('type_name'); //
        $this->load->model('foodtypemodel', 'ftmd');
        $this->ftmd->add_type($data);
        $new_data = $this->ftmd->selectFoodtypeInfo(array('shopid'=>$data['shopid']));
        $new_data = json_encode($new_data);
        echo $new_data;
    }
    //添加菜品
    public function add_food() {
        $data['shopid']         = $this->input->post('shop_id');
        $data['name']           = $this->input->post('food_name');
        $data['sort']           = $this->input->post('food_sort');
        $data['food_type']      = $this->input->post('type_id');
        $data['sale_price']     = $this->input->post('sale_price');
        $data['get_price']      = $this->input->post('get_price');
        $data['original_price'] = $this->input->post('original_price');
        $data['pic']            = $this->input->post('food_pic');
        $data['sale_num']       = $this->input->post('sale_num');
        $data['publish']        = $_SERVER['REQUEST_TIME'];
        $this->load->model('foodmodel', 'fmd');
        $this->fmd->add_food($data);
        //
        $new_data = $this->fmd->selectFoodList($data['shopid'],array(),array('publish'=>'DESC'));
        $new_data = json_encode($new_data);
        echo $new_data;
    }

    //
    public function test() {
        $this->load->model('foodmodel', 'fmd');
        $where['id'] = 34;
        $where['status'] = 0;
        $sort['id'] = 'ASC';
        $new_data = $this->fmd->selectFoodList(8,$where,$sort);
        print_r($new_data);
    }
}
