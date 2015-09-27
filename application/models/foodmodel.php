<?php
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class FoodModel extends MY_Model
{
    private $_table_name;
    
    public function __construct() {
        parent::__construct();
        $this->_table_name = 'food'; 
        $this->type_table_name = 'food_type'; 
        $this->load->model('redismodel','redis_m');
    }
    //redis中查询List
    public function selectFoodList($shopid,$where=array(),$sort=array()){
        $res = array();
        if(empty($shopid)){
            return $res;
        }
        //redis判断
        $food_list = $this->redis_m->smembers('shop_'.$shopid);
        if(empty($food_list)){
            $this->updateFoodRedis($shopid);
            $food_list = $this->redis_m->smembers('shop_'.$shopid);
        }
        //
        foreach ($food_list as $k=>$val){
            $res[] = $this->redis_m->hgetall($val);
        }
        //对redis结果条件查询
        $search_res = $res;
        if(!empty($where)){
            foreach($where as $wk=>$wv)
            {
                $search_res = $this->searchFood($search_res,$wk,$wv);
            }
        }
        //排序
        if(!empty($sort)){
            $sort_arr = array();
            $sort_k = '';
            $sort_v = '';
            foreach ($sort as $sk => $sv) {
                $sort_k = $sk;
                $sort_v = $sv;
            }
            foreach ($search_res as $ssv) {
                $sort_arr[] = $ssv[$sort_k];
            }
            if($sort_v == 'ASC'){
                array_multisort($sort_arr, SORT_ASC, $search_res);
            }elseif($sort_v == 'DESC'){
                array_multisort($sort_arr, SORT_DESC, $search_res);
            }
        }
        return $search_res;
        
        
        $ages = array();
foreach ($users as $user) {
    $ages[] = $user['age'];
}
 
array_multisort($ages, SORT_ASC, $users);


    }
    //redis筛选
    private function searchFood($data,$search_k,$search_v){
        $res = array();
        foreach ($data as $k => $v) {
            if($v[$search_k] == $search_v){
                $res[] = $v;
            }
        }
        return $res;
    }
    //查询type
    public function getFoodType($where,$field='*') {
        $data = $this->db->select($field)
                ->from($this->type_table_name)
                ->where($where)
                ->get()
                ->result_array();
        return $data;
    }
    //添加
    public function add_food($data){
        $this->db->insert($this->_table_name,$data);
        $insert_id = $this->db->insert_id();
        //更新redis
        $where['id'] = $insert_id;
        $food_info = $this->db->select('*')->from($this->_table_name)->where($where)->get()->row_array();
        $shopid = key_exists('shopid', $data)?$data['shopid']:0;
        if($insert_id && $shopid){
            $this->updateFoodRedis($shopid);
        }
        return $insert_id;
    }
    //更新某商家food的redis
    public function updateFoodRedis($shopid){
        if(empty($data))
        {
            $data = $this->db->select('*')
                    ->from($this->_table_name)
                    ->where(array('shopid'=>$shopid))
                    ->get()
                    ->result_array();
        }
        foreach ($data as $k=>$v){
            $this->redis_m->hmset('food_'.$v['id'],$v);
            $this->redis_m->sadd('shop_'.$shopid,'food_'.$v['id']);
        }
    }
}
