<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*完全同common的Sms类,只是为了解决m站跨域的问题
* 
*/
class Sms extends CI_Controller{

    public function __construct() {
        parent::__construct();
    }

    //注册验证码
    public function send_reg_code($tempId=14077) {
        $to = $this->input->post('reg_tel',true);
        $reg_id = $this->db->select('uid')->from('onethink_user')->where(array('reg_tel'=>$to))->get()->row_array();
        if($reg_id){
            $send_res['status'] = 0;
            $send_res['msg']    = '该手机号已经注册，您可直接登陆';
            echo json_encode($send_res);
            return;
        }
        $datas = array(str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT));
        $this->session->set_userdata('reg_code', $datas);
        $this->send_msg($to,$datas,$tempId);
    }
    //发送信息通用接口
    public function send_msg($to,$datas,$tempId){
        $param = array (
            'serverIP' => config_item('serverIP'),
            'serverPort'  => config_item('serverPort'),
            'softVersion' => config_item('softVersion')
        );
        $this->load->library('Rest',$param,'sms');
        $this->sms->setAccount(config_item('accountSid'),config_item('accountToken'));
        $this->sms->setAppId(config_item('appId'));

        $result = $this->sms->sendTemplateSMS($to,$datas,$tempId);
        $send_res = array();
        if($result == NULL ) {
            $send_res['status'] = 0;
            $send_res['msg']    = '状态码:sms001,信息发送失败';
        }
        if($result->statusCode!=0) {
            $send_res['status'] = 0;
            $send_res['msg']    = '状态码:sms002,'.$result->statusMsg;
        }else{
            // 获取返回信息
            //$smsmessage = $result->TemplateSMS;
            //echo "dateCreated:".$smsmessage->dateCreated."<br/>";
            //echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            $send_res['status'] = 1;
            $send_res['msg']    = '消息发送成功';
        }
        echo json_encode($send_res);
    }
    //验证注册信息
    public function reg_check($param) {
        
    }
}