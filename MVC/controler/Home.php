<?php
class Home extends controls{
    // các phương thức điều khiển
    function Get_data(){
        echo 'sss';
        $sv = $this->mode("sinhvien");


        $this->view("MasterLayout", [
            "inner"=> "about"
        ]);
    }

    function hello(){
        echo "aaaaaa";
    }
}
   
    
?>