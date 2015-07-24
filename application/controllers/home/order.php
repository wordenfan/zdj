<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel','umd');
        $this->load->model('authModel','auth');
    }
    //
    public function orderSubmit()
    {
        echo '订单提交页';
    }
}