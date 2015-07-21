<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel','umd');
        $this->load->model('shopmodel','smd');
        $this->load->model('foodmodel','fmd');
    }
    //
    public function shopinfo()
    {
        $sid =  $this->uri->segment(5);
        $info = $this->smd->getShop(array('id'=>$sid));
        if($info)
        {
            $open_flag = get_business_hour($info['business_hours'],$info['business_week']);
            $info['open_close'] = $open_flag;
            //类别
            $type = $this->fmd->getFoodType(array('shopid'=>$sid));
            $list = $this->fmd->getFoodList(array('shopid'=>$sid,'status'=>1));
            
            //整理数组
            $result_arr = array();
            foreach($type as $ik=>$iv)
            {
                $parr = array();
                foreach($list as $jk=>$jv)
                {
                    $tarr = array();
                    $tarr['type_id'] = $iv['id'];
                    $tarr['type_name'] = $iv['type_name'];
                    $tarr['food_name'] = $jv['name'];
//                    var_dump($tarr);
                    array_push($parr, $tarr);
                }
                array_push($result_arr, $parr);
            }
            var_dump($result_arr);
            exit;
            foreach($list as $ik=>$iv)
            {
                
            }
            for($i=0;$i<count($type);$i++)
            {
                $temp_arr = array();
                for($j=0;$j<count($list);$j++)
                {
                    array_push($temp_arr, $j);
                }
                $tid = $type[$i]['id'];
                $arr_key = array_search($tid, $type_arr);
                if($arr_key===false)//排除是0的情况
                {
                    array_push($type_arr, $tid);
                    $temp_arr = array();
                    array_push($temp_arr,$list[$i]);
                    array_push($result_arr,$temp_arr);
                }else{
                    array_push($result_arr[$arr_key], $list[$i]);
                }
                echo '====='.$arr_key;
                var_dump($type_arr);
//                var_dump($result_arr);
            }
//            $this->load->view('home/shop/shopinfo',$info);
        }else{
            redirect(base_url());
            exit;
        }
    }
    //登录
    public function login()
    {
        if($_POST)
        {
            $req_url = isset($_GET['req_url'])?$_GET['req_url']:base_url();
            $i_uname = $this->input->post('uname',true);
            $i_pwd = $this->input->post('pwd',true);
            $uid = $this->umd->login($i_uname,$i_pwd);//
            if(0 < $uid)
            {
                show_message('登录成功!',$req_url);
            }else{
                switch($uid) {
                    case -1: $error = '用户名或密码错误'; break; //用户不存在或被禁用！，系统级别禁用
                    case -2: $error = '用户名或密码错误'; break;//密码错误！
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                show_message('',base_url('home/User/login'),3,$error);
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
        redirect('home/User/login');
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
}