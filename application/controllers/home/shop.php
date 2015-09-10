<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! in_array(APPPATH . 'controllers/home/HomeBase.php', get_included_files()) ){
   require "HomeBase.php";
}
        
class Shop extends HomeBase {

    public function __construct() {
        parent::__construct();
        $this->load->library('shopping','','lib_cart');
    }
    //
    public function fruit()
    {
//        $data = array('a'=>1,'b'=>2);
//        unset($data);
//        $data['c'] = 3;    
//        $url = "http://www.phpddt.com/abc/de/fg.php?id=1";
//        $path = parse_url($url);
//        echo pathinfo($path['path'],PATHINFO_EXTENSION);
//        var_dump($path);
//        $this->load->view('home/shop/fruitshopinfo',$data);
    }
    //ajax购物
    public function doShopping()
    {
		$this->load->library('lib_shopinfo','','lib_shopinfo');
		$data = $this->lib_shopinfo->doShopping();
		echo $data;
    }
    //
    public function shopinfo()
    {
        $sid =  intval($this->uri->segment(5));
        if($sid)
        {
            $this->load->library('lib_shopinfo','','lib_shopinfo');
            $info = $this->lib_shopinfo->shopinfo($sid);
            //加载原有物品
            $lib_data = $this->lib_cart->getShopCart($sid);
            $_list = $lib_data['cur_shop'];
            $_list['total'] = $this->lib_cart->getPrice($sid);
            $info['shop_cart'] = json_encode($_list);
            $info['free_send'] = $this->lib_shopinfo->freeSend($sid);
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