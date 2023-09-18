<?php
    $connect = mysqli_connect('localhost', 'root', '', 'btl')
    or die("connect error!!");

    $key =  $_POST['idHK'];
    $sqlNganh = mysqli_query($connect,"SELECT *FROM nganh_hoc WHERE Mahk = '$key'");

    $num = mysqli_num_rows($sqlNganh);
    if($num > 0){
        while($row = mysqli_fetch_array($sqlNganh)){
            ?>
            <option value="<?php echo $row['Manganh']?>"><?php echo $row['Tennganh']?></option>
            <?php
        }
    }
?>