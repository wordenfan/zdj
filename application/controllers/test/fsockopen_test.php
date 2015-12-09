<?php

/*
 * 1.在根目录建立log.txt用于记录请求是否成功接收
 * 2.
 * and open the template in the editor.
 */

/**
 * Description of Fsockopen_test
 *
 * @author worden
 */
class Fsockopen_test {
    
    public function __construct() {
        
    }
    
    public function test_fsockopen() {
        //Post
        $param = array(
            'name' => 'fdipzone',
            'gender' => 'man'
        );
        $data = http_build_query($param);
        $fp = fsockopen("localhost", 80, $errno, $errstr, 30);
        
        $out = "POST /worden/zdj/index.php?/test/fsockopen_test/test_order HTTP/1.1\r\n";
        $out .= "Host: localhost\r\n";
        $out .= "Content-type:application/x-www-form-urlencoded\r\n";
        $out .= "Content-length:".strlen($data)."\r\n";
        $out .= "Connection:close\r\n\r\n";//发送后立即关闭不等待server的答复，另外一定要两个\r\n
        $out .= "${data}";

        fputs($fp, $out);
        fclose($fp);
        
        //========Get===============
        $fp = fsockopen("localhost", 80, $errno, $errstr, 30);
        if(!$fp){
            echo 123;
        }
        $out  = "GET /worden/zdj/index.php?/test/fsockopen_test/test_order HTTP/1.1\r\n";
        $out .= "Host: localhost\r\n";
        $out .= "Connection: Close\r\n\r\n";//发送后立即关闭不等待server的答复，另外一定要两个\r\n
        
        $res = fwrite($fp, $out);
        while (!feof($fp)) {
            echo fgets($fp, 128);
        }
        fclose($fp);
    }
    
    public function test_order() {
        if($_POST){
            $str = var_export($_POST,true);
            file_put_contents('./log.txt', $str.'::'.date('Y-m-d H:i:s', mktime()).PHP_EOL,FILE_APPEND);
        }else{
            file_put_contents('./log.txt', date('Y-m-d H:i:s', mktime()).PHP_EOL,FILE_APPEND);
        }
        echo '====123';
        exit;
        $food_list = array(
            1777=>array('name'=>'孜盐鱿鱼','price'=>'40.0','type'=>'麻辣海鲜','num'=>1),
            1788=>array('name'=>'牛板筋','price'=>'30.0','type'=>'麻辣海鲜','num'=>1)
        );
        $order_data = array("oname"=>"泰鹏大厦","otel"=>'15245845785','oaddress'=>'好地方','remark'=>'',
            'pay_status'=>0,'oshop_id'=>'42','osum_real'=>70,'opay'=>63,'oip'=>"127.0.0.1",
            'osum'=>76,'send_price'=>'6','oshop_name'=>'领鲜','oshop_tel'=>'17685521107',
            'oshop_address'=>"唐F小区",'uid'=>'1995','uname'=>'用户7901','opublish'=>1449568478,
            'oid'=>'55666a8df044ad0087','alipay_trade_code'=>0,'user_status'=>1
        );
        $this->load->library('weixin_order','','lib_weixin');
        $this->lib_weixin->sendOrderMsg($order_data,$food_list,$order_data['oid']);
    }
}
