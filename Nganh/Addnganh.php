<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');

if (isset($_POST['btnInsert'])) {
    $mn = $_POST['txtManganh'];
    $tn = $_POST['txtTennganh'];
    $hk = $_POST['txtHk'];
    //trung ma
    if ($mn == '') {
        echo '<script>alert("RỖNG!!!")</script>';
    } else {
        $slqtrungma = "SELECT *FROM nganh_hoc WHERE Manganh = '$mn'";
        $data = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($data) > 0) {
            echo "<script>alert('TRÙNG MÃ RỒI!!!')</script>";
        } else {
            $sql = "INSERT INTO nganh_hoc VALUES('$mn','$tn','$hk')";
            $kq = mysqli_query($con, $sql);
            if ($kq)
                echo "<script>alert('Thêm ngành học thành công')</script>";
            else
                echo "<script>alert('Thêm ngành học thất bại')</script>";
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
        <table border="1px soild">
            <tr>
                <th colspan="2">CẬP NHẬT THÊM NGÀNH HỌC</th>
            </tr>

            <tr>
                <td>Mã ngành</td>
                <td>
                    <input type="text" name="txtManganh">
                </td>
            </tr>
            <tr>
                <td>Tên ngành</td>
                <td>
                    <input type="text" name="txtTennganh">
                </td>
            </tr>
            <tr>
                <td>Học kỳ</td>
                <td>
                    <select name="txtHk">
                        <?php
                        $sqlHK = mysqli_query($con, "SELECT * FROM hoc_ky");
                        if (isset($sqlHK) && $sqlHK != null) {
                            while ($rows = mysqli_fetch_array($sqlHK)) {
                        ?>
                                <option value="<?php echo $rows['Mahk'] ?>"><?php echo $rows['Tenhk'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
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