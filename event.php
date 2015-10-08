<?php
/**
 * 事件异常
 *
 * @author        lonely
 * @create            2010-10-21
 * @version        0.1
 * @lastupdate     lonely
 * @package     Event
*/
class Exception_Event extends Exception {}
/**
 * 事件对象
 *
 * @author        lonely
 * @create            2010-10-21
 * @version        0.1
 * @lastupdate     lonely
 * @package     Event
*/
class Event extends stdClass{
    public $target=null;
    public $type=null;
    /**
     * 创建事件
     * @param string $type
     */
    public function __construct($type){
        $this->type=trim($type);
    }
    /**
     * 得到事件字符串
     */
    public function __toString(){
        return $this->type;
    }
}
/**
 * 事件派发
 *
 * @author        lonely
 * @create            2010-10-21
 * @version        0.1
 * @lastupdate     lonely
 * @package     Event
*/
class EventDispatcher{
    private $_callback_method;
    /**
     * 添加事件
     * @param Event $event
     * @param string $method
     * @param string||object $class
     * @return boolean true
     */
    public function addEventListener(Event $event,$method,$class=null){
        $event->target=$this;
        $eventstr=$this->_create_event_str($event);
//        if($this->has($event,$method,$class))
//            return true;
        if($class!=null){
            $this->_check_method($class,$method);
            $this->_callback_method[$eventstr][]=$this->_create_listener_method($eventstr,$class,$method);
        }else{
//            $this->_check_function($method);
            $this->_callback_method[$eventstr][]=$this->_create_listener_fn($eventstr,$method);
        }
        var_dump($this->_callback_method);
        echo '<br>';
        echo '=======';
        var_dump($this->_callback_method[$eventstr]);
        return true;
    }
    /**
     * 派发事件
     * @param Event $event
     * @param string $method
     * @param string||object $class
     * @return void
     */
    public function dispatcher(Event $event){
        $eventstr=$this->_create_event_str($event);
//        if($this->_check_callback($eventstr)){
            
        var_dump($this->_callback_method);
        var_dump($this->_callback_method[$eventstr]);
            foreach ($this->_callback_method[$eventstr] as $v){
                if($v['object']){
                    if(is_object($v['class'])){
                        $v['class']->$v['method']($event);
                    }else{
                        call_user_func(array($v['class'], $v['method']),$event);
                    }
                }else{
                    echo $v['function'];
//                    $v['function']();
                }
            }
//        }
    }
    /**
     * 删除事件
     * @param Event $event
     * @param string $method
     * @param string $class
     * @return boolean true
     */
    public function detact(Event $event,$method,$class=null){
        $eventstr=$this->_create_event_str($event);
        if(!$this->_check_callback($eventstr))
            return true;
        if(!$this->has($event,$method,$class))
            return true;
            if($class!=null){
            $this->_check_method($class,$method);
            foreach ($this->_callback_method[$eventstr] as $k=>$v) {
                if(($v==$this->_create_listener_method($eventstr,$class,$method))){
                    unset($this->_callback_method[$eventstr][$k]);
                    return true;
                }
            }
            return true;
        }else{
            $this->_check_function($method);
            foreach ($this->_callback_method[$eventstr] as $k=>$v) {
                if(($v==$this->_create_listener_fn($eventstr,$method))){
                    unset($this->_callback_method[$eventstr][$k]);
                    return true;
                }
            }
            return true;
        }
    }
    /**
     * 检测事件是否监听
     * @param Event $event
     * @param string $method
     * @param string $class
     * @return boolean 
     */
    public function has(Event $event,$method,$class=null){
        $eventstr=$this->_create_event_str($event);
        if(($class!=null)){
            $this->_check_method($class,$method);
            if($this->_check_callback($eventstr)){
                foreach($this->_callback_method[$eventstr] as $v){
                    if(is_object($v['class'])){
                        $v_class=get_class($v['class']);
                    }else{
                        $v_class=$v['class'];
                    }
                    if(is_object($class)){
                        $s_class=get_class($class);
                    }else{
                        $s_class=$class;
                    }
                    $temp_v=array(
                        "class"=>$v_class,
                        "method"=>$method,
                    );
                    $temp_s=array(
                        "class"=>$s_class,
                        "method"=>$method,
                    );
                    if($temp_v==$temp_s){
                        return true;
                    }
                }
            }
        }else{
            $this->_check_function($method);
            if($this->_check_callback($eventstr)){
                foreach($this->_callback_method[$eventstr] as $v){
                    if($method==$v['function']){
                        return true;
                    }
                }
            }
        }
        return false;
    }
    /**
     * 检测指定类是否存在指定方法
     * @param string $class
     * @param string $method
     * @exception Exception_Event 
     * @return void
     */
    private function _check_method($class,$method){
        if(!method_exists($class,$method)){
            throw new Exception_Event(get_class($class)." not exist ".$method." method",1);
        }
    }
    /**
     * 检测指定函数是否存在
     * @param string $function 
     * @return void
     */
    private function _check_function($function){
        if(!function_exists($function)){
            throw new Exception_Event($function." function not exist ",2);
        }
    }
    /**
     * 检测指定事件是否存在监听函数
     * @param string $eventstr
     * @return boolean 
     */
    private function _check_callback($eventstr){
        if(isset($this->_callback_method[$eventstr])
            &&is_array($this->_callback_method[$eventstr])
        ){
            return true;
        }
        return false;
    }
    /**
     * 创建监听函数数组
     * @param string $eventstr
     * @param string $function
     * @return array 
     */
    private function _create_listener_fn($eventstr,$function){
        return array(
            "object"=>false,
            "function"=>$function,
        );
    }
    /**
     * 创建监听类数组
     * @param string $eventstr
     * @param string $class
     * @param string $method
     * @return array 
     */
    private function _create_listener_method($eventstr,$class,$method){
        return array(
            "object"=>true,
            "class"=>$class,
            "method"=>$method,
        );
    }
    /**
     * 创建事件字符串
     * @param Event $event
     * @return string 
     */
    private function _create_event_str(Event $event){
        $classstr=strtolower(get_class($event));
        $eventstr=(string)$event;
        return $classstr.$eventstr;
    }
}
class Test extends EventDispatcher{
    
}
class EventExecute extends EventDispatcher
{
//    function alertMsg($e){
//        print_r($e->a);
//    }
    function alertMsg(){
        print_r('hello message!');
    }
}


$event = new Event("click");

$ect   = new EventExecute();
$ect->addEventListener($event,"alertMsg");

//$test = new Test();
//$test->dispatcher($event);

//当前类,事件中心类,执行事件类