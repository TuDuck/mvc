<?php
    $id = $_GET['id'];

    $con = mysqli_connect('localhost', 'root', '','btl')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM don_gia WHERE ID='$id'";
    $kq = mysqli_query($con, $sql);

    mysqli_close($con);
    if($kq) echo "<script>alert('Xóa đơn giá thành công!!')</script>";
    else echo "<script>alert('Xóa đơn giá thất bại!!')</script>";

    echo "<script>window.location.href='./indexCost.php'</script>";
?>