<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

    var $ormd;//
    
    function __construct()
    {
        parent::__construct();
		$this->load->library('lib_order','','lib_order');
		$this->load->model('orderlistmodel','olmd');
    }
    //
    public function index()
    {
        $order_list = $this->lib_order->getOrderList(10,1);
        $order_data['riqi'] = date('Y-m-d',$_SERVER['REQUEST_TIME']);
        $order_data['shijian'] = date('H:i:s',$_SERVER['REQUEST_TIME']);
        $order_data['list'] = $order_list;
        foreach ($order_data['list']['data'] as $k => $v) {
            $order_data['list']['data'][$k]['oshop_tel'] = explode(';', $v['oshop_tel']);
            $food_list = $this->olmd->getOrderListInfo(array('snid'=>$v['snid']));
            $list_str = '';
            foreach ($food_list as $m => $n) {
                $num = $list_str.$n['fnum'];
                if($n['fnum']>1){
                    $num = $list_str.'<font color="red">'.$n['fnum'].'</font>';
                }
                $list_str = $num.'*'.$n['fprice'].'&nbsp&nbsp&nbsp&nbsp'.$n['fname'].'<br>';
            }
            $order_data['list']['data'][$k]['food_list'] = $list_str;
            
        }
        $this->load->view('z/order',$order_data);
    }
    //微信跳转详情
    public function detail(){
//        $snid = $this->uri->segment(3);
        $snid = 7308;
        
        $order_list = $this->lib_order->getOrderList(1,1,array('snid'=>$snid));
        $order_list['data'][0]['oshop_tel'] = explode(';', $order_list['data'][0]['oshop_tel']);
        $food_list = $this->olmd->getOrderListInfo(array('snid'=>$snid));
        
        $order_list['riqi'] = date('Y-m-d',$_SERVER['REQUEST_TIME']);
        $order_list['shijian'] = date('H:i:s',$_SERVER['REQUEST_TIME']);
        $list_str = '';
        foreach ($food_list as $m => $n) {
            $num = $list_str.$n['fnum'];
            if($n['fnum']>1){
                $num = $list_str.'<font color="red">'.$n['fnum'].'</font>';
            }
            $list_str = $num.'*'.$n['fprice'].'&nbsp&nbsp&nbsp&nbsp'.$n['fname'].'<br>';
        }
        $order_list['data'][0]['food_list'] = $list_str;
        
        $this->load->view('z/detail',$order_list);
    }
}