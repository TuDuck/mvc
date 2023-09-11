<?php
class app{
    protected $controller='Home';
    protected $action='Get_data';
    protected $param=[];
     function __construct() {
        // echo 'hello app';
        $arr=$this->ProcessURL();
        //xử lý Controller
        if($arr!=null){
            if(file_exists("./MVC/controler/".$arr[0].".php")){
                $this->controller=$arr[0];
                unset($arr[0]);
            }
        }    
        require_once "./MVC/controler/".$this->controller.".php";
        $this->controller=new $this->controller;
        //xử lý Action
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action=$arr[1];
            }
            unset($arr[1]);
        }
        //Xử lý params
        $this->param=$arr?array_values($arr):[];
        //tạo biến có 3 tham số
        call_user_func_array([$this->controller,$this->action],$this->param);
    }
    function ProcessURl(){
        if(isset($_GET['url'])){
            return explode("/",filter_var(trim($_GET["url"]),FILTER_DEFAULT,));
        }
    }
}
?>