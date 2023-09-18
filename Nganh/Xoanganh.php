<?php
    $mn = $_GET['manganh'];

    $con = mysqli_connect('localhost', 'root', '','btl')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM nganh_hoc WHERE Manganh='$mn'";
    $kq = mysqli_query($con, $sql);

    mysqli_close($con);
    if($kq){
        echo "<script>alert('Xóa ngành học thành công!!')</script>";
    } 
    else{
        echo "<script>alert('Xóa ngành học thất bại!!')</script>";
    } 

    echo "<script>window.location.href='./ListNganh.php'</script>";
