<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel','umd');
    }
    //
    public function register()
    {
        if($_POST)
        {
            //去除验证码session
            $this->session->unset_userdata('yzm');
            //写入数据库
            $uid = $this->umd->addUser($this->input->post('uname',true), $this->input->post('pwd',true));
            if(0 < $uid)
            {
                $this->umd->autoLogin($uid);
                show_message('注册成功，现在可以点餐啦！',base_url());
            } else {
                show_message('',base_url(),3,'注册失败');
            }
        }
        else {
            $this->load->view('home/user/register');
        }
    }
    /*
     * 登录
     * $from='shop'/'login'
     * shop页则返回json,login页直接跳转
     */
    public function login($from='login')
    {
        if($_POST)
        {
            $req_url = isset($_GET['req_url'])?$_GET['req_url']:base_url();
            $i_uname = $this->input->post('uname',true);
            $i_pwd = $this->input->post('pwd',true);
            $uid = $this->umd->login($i_uname,$i_pwd);//
            if(0 < $uid)
            {
                $from=='shop' ? echo_json(array('flag'=>'1','msg'=>'登陆成功')) : show_message('登录成功!',$req_url);
            }else{
                switch($uid) {
                    case -1: $error = '用户名或密码错误'; break; //用户不存在或被禁用！，系统级别禁用
                    case -2: $error = '用户名或密码错误'; break;//密码错误！
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $from=='shop' ? echo_json(array('flag'=>'0','msg'=>$error)) : show_message('',base_url('home/user/login'),3,$error);
            }
        }else {
            $data['send_area'] = $this->config->item(AREA.'SERVICE_AREA');
            $this->load->view('home/user/login',$data);
        }
    }
    //退出
    public function logout()
    {
        if(UID)
        {
            $this->umd->logout();
        }
        redirect('home/user/login');
    }
    //用户名校验
    public function check_uname()
    {
        $uname = $this->input->post('uname');
        if($_POST && $uname)
        {
            $data = $this->umd->getUserInfo(array('uname'=>$uname),'uname');
            if(!$data){
                echo 'false';
            } else{
                echo 'true';
            }
        }
    }
    //验证码校验
    public function check_captcha()
    {
        $captcha = $this->input->post('ucode');
        if($_POST && $captcha)
        {
            if($this->session->userdata('yzm')!=strtolower($captcha)){
                echo 'false';
            } else{
                echo 'true';
            }
        }
    }
    //个人中心
    public function pcenter()
    {
        if($_POST)
        {
            $uid = $this->input->post('uid');
            $uname = $this->input->post('uname');
            $sex = $this->input->post('usex');
            $age = $this->input->post('uage');
            $where = array('uid !=' => $uid, 'uname' => $uname);
            $res = $this->db->select('count(*) as accord')->where($where)->from('user')->get()->row_array();
            if($res['accord'])
            {
                $info = array('ajax_name'=>'昵称已被占用！', 'ajax_uid'=>-1);//
            }else{
                $data['uname'] = $uname;
                $data['sex'] = $sex;
                $data['age'] = $age;
                $this->db->where('uid',$uid)->update('user',$data);
                $info = array('ajax_name'=>$uname, 'ajax_sex'=>$sex, 'ajax_age'=>$age, 'ajax_uid'=>$uid);
                //TODO异常处理
            }
            $userinfo = json_encode($info);
            echo $userinfo;
        }else{
            $uid = $this->login_status();
            $data = $this->umd->getUserInfo(array('uid'=>$uid),'uid,uname,score,sex,age,tel,address');
            $this->load->view('home/user/pcenter',$data);
        }
    }
    //地址 
    public function address()
    {
        if($_POST)//ajax
        {
            $uid = $this->input->post('uid_js',true);
            $tel = trim($this->input->post('tel_js',true));
            $address = trim($this->input->post('location_js',true));
            $data['uid'] = $uid;
            $data['tel'] = $tel;
            $data['address'] = $address;
            $this->db->where('uid',$uid)->update('user',$data);
            //TODO异常处理
            $info = array('ajax_tel'=>$tel,'ajax_location'=>$address,'ajax_uid'=>$uid);
            $userinfo = json_encode($info);
            echo $userinfo;
        }else{
            $uid = $this->login_status();
            $data = $this->umd->getUserInfo(array('uid'=>$uid),'uid,address,tel,address');
            $this->load->view('home/user/address',$data);
        }
    }
    //MyOrder
    public function myorder()
    {
        $uid = $this->login_status();
        $sql = 'select snid,oid,oshop_id,opublish,oshop_name,osum,opay,status,pay_status from onethink_order where uid = '.UID.' order by onethink_order.oid desc limit 10';
        $res = $this->db->query($sql)->result_array();
        $data['list'] = $res;
        
        $this->load->view('home/user/myorder',$data);
    }
}