<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    //
    function inserertSql() {
        
        $new_db = $this->load->database('default',true);
        $pre_db = $this->load->database('previous',true);
        
        
        //===================onethink_user_address=======
//        $sql2 = 'select * from onethink_ucenter_member';
//        $res2 = $pre_db->query($sql2);
//        $res2 = $res2->result();
//        
//        foreach ($res2 as $rk => $rv) {
//            if(strlen($rv->address)<5){
//                continue;
//            }
//            $data['is_default'] = 1;
//            $data['status']     = 1;
//            foreach ($rv as $k => $v) {
//                if($k=='nickname'||$k=='password'||$k=='reg_time'||$k=='last_login_time'||$k=='score'||$k=='sex'||$k=='age'||$k=='status'||$k=='mark_info'){
//                    continue;
//                }
//                if($k=='nickname'){
//                    $k = "add_uname";
//                }
//                if($k=='id'){
//                    $k = "uid";
//                }
//                $data[$k] = $v;
//            }
//            $new_db->insert('onethink_user_address',$data);
//            echo $new_db->insert_id().'<br/>';
//        }
        
        
        
        
        //===================onethink_user=======
//        $sql2 = 'select * from onethink_ucenter_member';
//        $res2 = $pre_db->query($sql2);
//        $res2 = $res2->result();
//        
//        foreach ($res2 as $rk => $rv) {
//            if(strpos($rv->nickname,'阿凡达')!==FALSE){
//                continue;
//            }
//            $data['wei_id']     = 0;
//            $data['reg_areaid'] = 1;
//            foreach ($rv as $k => $v) {
//                if($k == 'address'||$k=='mark_address'){
//                    continue;
//                }
//                if($k=='tel'){
//                    $k = "reg_tel";
//                }
//                if($k=='id'){
//                    $k = "uid";
//                }
//                if($k=='nickname'){
//                    $k = "uname";
//                }
//                $data[$k] = $v;
//            }
//            $new_db->insert('onethink_user',$data);
//            echo $new_db->insert_id().'<br/>';
//        }
        
        
        //===================onethink_user_old=======
//        $sql2 = 'select * from onethink_member_old';
//        $res2 = $pre_db->query($sql2);
//        $res2 = $res2->result();
//        
//        foreach ($res2 as $rk => $rv) {
//            $data['score']      = 0;
//            foreach ($rv as $k => $v) {
//                if($k=='nickname'){
//                    $k = "uname";
//                }
//                $data[$k] = $v;
//            }
//            $new_db->insert('onethink_user_old',$data);
//            echo $new_db->insert_id().'<br/>';
//        }
        
        
        //===================onethink_order=======
//        $sql2 = 'select * from onethink_order';
//        $res2 = $pre_db->query($sql2);
//        $res2 = $res2->result();
//        
//        foreach ($res2 as $rk => $rv) {
//            $data['send_price']             = 0;
//            $data['oid']                    = 0;
//            $data['alipay_trade_code']      = 0;
//            foreach ($rv as $k => $v) {
//                if($k=='oid'){
//                    $k = "snid";
//                }
//                if($k=='status'){
//                    $k = "order_status";
//                }
//                $data[$k] = $v;
//            }
//            $new_db->insert('onethink_order',$data);
//            echo $new_db->insert_id().'<br/>';
//        }
        
        
        //===================onethink_order=======
//        $sql2 = 'select * from onethink_order_list';
//        $res2 = $pre_db->query($sql2);
//        $res2 = $res2->result();
//        
//        foreach ($res2 as $rk => $rv) {
//            foreach ($rv as $k => $v) {
//                if($k=='oid'){
//                    $k = "snid";
//                }
//                $data[$k] = $v;
//            }
//            $new_db->insert('onethink_order_list',$data);
//            echo $new_db->insert_id().'<br/>';
//        }
    }