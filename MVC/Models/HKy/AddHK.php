<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');

if (isset($_POST['btnInsert'])) {
    $mahk = $_POST['txtMahk'];
    $tenhk = $_POST['txtTenhk'];

    //trung ma
    if ($mahk == '') {
        echo '<script>alert("RỖNG!!!")</script>';
    } else {
        $slqtrungma = "SELECT * FROM hoc_ky WHERE Mahk = '$mahk'";
        $data = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($data) > 0) {
            echo "<script>alert('TRÙNG MÃ RỒI!!!')</script>";
        } else {
            $sql = "INSERT INTO hoc_ky VALUES('$mahk','$tenhk')";
            $kq = mysqli_query($con, $sql);
            if ($kq)
                echo "<script>alert('Thêm học kỳ thành công')</script>";
            else
                echo "<script>alert('Thêm học kỳ thất bại')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post" action="">
        <table>
            <tr>
                <th colspan="2">CẬP NHẬT THÊM HỌC KỲ</th>
            </tr>

            <tr>
                <td>Mã học kỳ</td>
                <td>
                    <input type="text" name="txtMahk">
                </td>
            </tr>
            <tr>
                <td>Tên học kỳ</td>
                <td>
                    <input type="text" name="txtTenhk">
                </td>
            </tr>

            <tr align="center">
                <td colspan="2">
                    <input type="submit" name="btnInsert" value="INSERT">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>