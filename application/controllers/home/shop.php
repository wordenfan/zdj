<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "HomeBase.php";
}
        
class Shop extends HomeBase {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
        $this->load->model('shopmodel','smd');
        $this->load->model('foodmodel','fmd');
        $this->load->library('shopping','','cart');
    }
    //
    public function fruit()
    {
//        $data = array('a'=>1,'b'=>2);
//        unset($data);
//        $data['c'] = 3;    
        $url = "http://www.phpddt.com/abc/de/fg.php?id=1";
        $path = parse_url($url);
        echo pathinfo($path['path'],PATHINFO_EXTENSION);
        var_dump($path);
//        $this->load->view('home/shop/fruitshopinfo',$data);
    }
    //ajax购物
    public function doShopping()
    {
		$this->load->library('lib_shopinfo','','lib_shopinfo');
		$data = $this->lib_shopinfo->doShopping();
		echo $data;
        // if($_POST)
        // {
            // $_sid = (int)$this->input->post('sid',true);
            // $_id = (int)$this->input->post('fid',true);
            // $_mod = (int)$this->input->post('fmod',true);
            // $_sendprc = $this->input->post('send_price',true);
            // switch ($_mod)
            // {
                // case 1://增加
                    // $_price = $this->input->post('fprice',true);
                    // $_name = trim($this->input->post('fname',true));
                    // $_type = $this->input->post('ftype',true);
                    // $this->cart->addItem($_sid,$_id,$_name,$_price,$_type);
                    // break;
                // case 2://减去
                    // $this->cart->decItem($_sid,$_id);
                    // break;
                // case 3://移除
                    // $this->cart->delItem($_sid,$_id);
                    // break;
            // }
            // $_list = $this->cart->getAll($_sid);
            // $_list['total'] = $this->cart->getPrice($_sid);//最终合计价格
            // $food_list = json_encode($_list);
            // echo $food_list;
        // }
    }
    //
    public function shopinfo()
    {
        $sid =  $this->uri->segment(5);
        if($sid)
        {
            $this->load->library('lib_shopinfo','','lib_shopinfo');
            $info = $this->lib_shopinfo->shopinfo($sid);
            //加载原有物品
            $_list = $this->cart->getAll($sid);
            $_list['total'] = $this->cart->getPrice($sid);
            $food_list = json_encode($_list);
            $info['shop_cart'] = $food_list;
			//
			$this->load->model('addonsmodel','amd');
			$freeSend_arr = $this->amd->freeSend();
			$info['free_send'] = in_array($info['id'],$freeSend_arr)?1:0;
			//
            if($info['show_type'] == '2'){
                $this->load->view('home/shop/imgshop',$info);
            }else{
                $this->load->view('home/shop/defaultshop',$info);
            }
        }else{
            redirect(base_url());
            exit;
        }
    }
    
}