<?php
    $mhk = $_GET['mahk'];

    $con = mysqli_connect('localhost', 'root', '','btl')
    or die('loi ket noi rui huhu');

    $sql = "DELETE FROM hoc_ky WHERE Mahk='$mhk'";
    $kq = mysqli_query($con, $sql);

    mysqli_close($con);
    if($kq) echo "<script>alert('Xóa học kỳ thành công!!')</script>";
    else echo "<script>alert('Xóa học kỳ thất bại!!')</script>";

    echo "<script>window.location.href='./ListHK.php'</script>";
?>