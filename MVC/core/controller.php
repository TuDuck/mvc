<?php
class controls{
    // gọi models
    public function mode($mode){
        include_once './MVC/Models/'.$mode.'.php';
        return new $mode;
     }
     // gọi view
     public function view($view,$data=[]){
        include_once './MVC/View/'.$view.'.php';
     }
}
   
?>