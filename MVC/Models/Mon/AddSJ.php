<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');

if (isset($_POST['btnInsert'])) {
    $mm = $_POST['txtMamon'];
    $nameS = $_POST['txtTenmon'];
    $hk = $_POST['txtHk'];
    $tn = $_POST['txtTennganh'];
    $stc = $_POST['txtStc'];

    //trung ma
    if ($mm == '') {
        echo '<script>alert("RỖNG!!!")</script>';
    } else if ($tn == '') {
        echo '<script>alert("NGÀNH GÌ ???")</script>';
        echo "<script>window.location.href='./AddSJ.php'</script>";
    } else {
        $slqtrungma = "SELECT * FROM mon_hoc_phi WHERE Mamh = '$mm'";
        $data = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($data) > 0) {
            echo "<script>alert('TRÙNG MÃ RỒI!!!')</script>";
        } else {
            $sql = "INSERT INTO mon_hoc_phi VALUES('$mm','$nameS','$hk','$tn', '$stc')";
            $kq = mysqli_query($con, $sql);
            if ($kq)
                echo "<script>alert('Thêm môn học thành công')</script>";
            else
                echo "<script>alert('Thêm môn học thất bại')</script>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="ajax.js" type="text/javascript"></script>
</head>

<body>

    <form method="post" action="">
        <table>
            <tr>
                <th colspan="2">CẬP NHẬT THÊM MÔN HỌC</th>
            </tr>

            <tr>
                <td>Mã môn học</td>
                <td>
                    <input type="text" name="txtMamon">
                </td>
            </tr>
            <tr>
                <td>Tên môn học</td>
                <td>
                    <input type="text" name="txtTenmon">
                </td>
            </tr>
            <tr>
                <td>Học kỳ</td>
                <td>
                    <Select class="hk" name="txtHk" id="select">
                        <option>--HỌC KỲ--</option>
                        <?php
                        $sqlHk = mysqli_query($con, "SELECT * FROM hoc_ky");
                        if (isset($sqlHk) && $sqlHk != null) {
                            while ($row = mysqli_fetch_array($sqlHk)) {
                        ?>
                                <option value="<?php echo $row['Mahk'] ?>"><?php echo $row['Tenhk'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </Select>
                </td>
            </tr>
            <tr>
                <td>Tên Ngành</td>
                <td>
                    <select name="txtTennganh" class="tennganh">
                        <option>--Ngành--</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Số tín chỉ</td>
                <td>
                    <input type="text" name="txtStc">
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