<?php
class controls{
    // gọi models
    public function model($model){
        include_once './MVC/Models/'.$model.'.php';
        return new $model;
     }
     // gọi view
     public function view($view,$data=[]){
        include_once './MVC/View/'.$view.'.php';
     }
}
   
?>