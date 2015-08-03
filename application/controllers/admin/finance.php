<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/admin/AdminBase.php', get_included_files()) ){
   require "AdminBase.php";
}

class OrderAdmin extends AdminBase 
{
    var $ormd;//
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('ordermodel','omd');
    }
    public function orderList()
    {
        //每次刷新都会清空redis的list
        $this->load->model('redismodel','redis_m');
        $this->redis_m->del('order');
            
//        $num = $this->ormd->count();
//        $page=$_GET['page']?$_GET['page']:1;
//        $page = new Page($num,20,$page,'?page={page}');            
//        $data = $this->ormd->getAllInfo('limit',array($page->page_limit,$page->list_show_num));
//
//        $this->assign('list',$data);
//        $show = $page->myde_write();
//        $this->assign('page',$show);
//        $this->display();
        
        $data = [];
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
        $tdata = [];
        $this->load->view('admin/index',$tdata);
    }
    //
    public function ad_top()
    {
        $tdata = [];
        $this->load->view('admin/public/top',$tdata);
    }
    //
    public function ad_menu()
    {
        $tdata = [];
        $this->load->view('admin/public/menu',$tdata);
    }
}
