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
    //查询List
    public function getFoodList($where){
        $res = array();
        $shopid = key_exists('shopid', $where)?$where['shopid']:0;
        $shop_food_num = $this->redis_m->smembers('shop_'.$shopid);
        //redis判断
        if(empty($shop_food_num)){
            $res = $this->db->select('*')
                ->from($this->_table_name)
                ->where($where)
                ->order_by('sort')
                ->get()
                ->result_array();
            foreach ($res as $k=>$v){
                $this->redis_m->hmset('food_'.$v['id'],$v);
                $this->redis_m->sadd('shop_'.$shopid,'food_'.$v['id']);
            }
        }else{
            foreach ($shop_food_num as $k=>$val){
                $res[] = $this->redis_m->hgetall($val);
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
}
