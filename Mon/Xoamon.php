<?php
    $mm = $_GET['mamon'];

    $con = mysqli_connect('localhost', 'root', '','btl')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM mon_hoc_phi WHERE Mamh='$mm'";
    $kq = mysqli_query($con, $sql);

    mysqli_close($con);
    if($kq) echo "<script>alert('Xóa môn học thành công!!')</script>";
    else echo "<script>alert('Xóa môn học thất bại!!')</script>";

    echo "<script>window.location.href='./ListSj.php'</script>";
?>