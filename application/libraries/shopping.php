<?php

class Shopping 
{
    public $items=array(); 
    
    //初始化设置item;
    public function __construct()
    {
        $cookie_val = get_cookie('cart');
        if(!$cookie_val || !isset($cookie_val)) 
        {
            //缓存一小时
            $this->checkCookieChange();
        }else{
            $this->items = unserialize(think_decrypt(get_cookie('cart')));
        }
    }
    //所有item改动重新赋值cookie;
    private function checkCookieChange()
    {
        set_cookie('cart',  think_encrypt(serialize($this->items)),3600*1);
    }
    //添加商品
    public function addItem ($shop_id,$id,$name,$price,$type=1,$num=1) 
    {
        //有该商店的物品
        if($this->hasShop($shop_id))
        {
            if($this->hasItem($shop_id,$id))//添加数量
            {
                $this->incItem($shop_id,$id,$num);
                return;
            }else{//添加新物品
                $this->items[$shop_id][$id]['name'] = $name;
                $this->items[$shop_id][$id]['price'] = $price;
                $this->items[$shop_id][$id]['type'] = $type;
                $this->items[$shop_id][$id]['num'] = $num;
            }
        }else{//添加商店及物品
            $this->clearCart();//清空购物车，只保留一家店铺
            $this->items[$shop_id] = array();
            $this->items[$shop_id][$id]['name'] = $name;
            $this->items[$shop_id][$id]['price'] = $price;
            $this->items[$shop_id][$id]['type'] = $type;
            $this->items[$shop_id][$id]['num'] = $num;
        }
        $this->checkCookieChange();
    }
    //判断是否为该商店物品
    public function hasShop($shop_id) 
    {
        return array_key_exists($shop_id,$this->items);
    }
    //判断某商品是否存在
    public function hasItem($shop_id,$id) 
    {
        return array_key_exists($id, $this->items[$shop_id]);
    }
    //商品数量增加1
    public function incItem($shop_id,$id,$num=1) 
    {
        if($this->hasItem($shop_id,$id))
        {
            $this->items[$shop_id][$id]['num'] += $num;
        }
        $this->checkCookieChange();
    }
    //商品数量减少1
    public function decItem($shop_id,$id,$num=1) 
    {
        if($this->hasItem($shop_id,$id)){
            $this->items[$shop_id][$id]['num'] -= $num;
        }
        //删除商品
        if($this->items[$shop_id][$id]['num'] < 1){
            $this->delItem($shop_id,$id);
        }
        //删除商店
        if(count($this->items[$shop_id]) < 1){
            $this->delShop($shop_id);
        }
        
        $this->checkCookieChange();
    }
    //删除某商店
    public function delShop($shop_id){
        unset($this->items[$shop_id]);
        $this->checkCookieChange();
    }
    //删除某商品
    public function delItem($shop_id,$id) {
        unset($this->items[$shop_id][$id]);
        $this->checkCookieChange();
    }
    //返回购物车中的所有商品
    public function getShopCart ($shop_id='all') {
        $cur_shop = array();
        $all_shop = empty($this->items) ? array() : $this->items;
        if(is_numeric($shop_id) && isset($this->items[$shop_id])){
            $cur_shop = $this->items[$shop_id];
        }
        return array('cur_shop'=>$cur_shop,'all_shop'=>$all_shop);
    }
    //返回商家数量
    public function getShopNum () {
        if(count($this->items) == 0) {
            return 0;
        }
        //清除空物品的商店
        foreach($this->items as $key=>$v){
            $list_num = count($v);
            if($list_num<1)
            {
                $this->delShop($key);
            }
        }
        return count($this->items);
    }
    //查询购物车的所有商品总金额
    public function getPrice ($shop_id) {
        if(count($this->items) == 0) {
            return 0;
        }
        $price = 0.0;
        foreach($this->items as $arr_shopid=>$sv)
        {
            if($shop_id == $arr_shopid)//获取某商店的商品总价
            {
                foreach($this->items[$arr_shopid] as $foodid=>$fv)
                {
                    $price += $fv['num'] * $fv['price'];
                }
            }
        }
        return $price;
    }
    //清空购物车
    public function clearCart () {
        $this->items = array();
        delete_cookie('cart');
    }
}
