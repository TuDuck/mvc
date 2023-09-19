<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');

$mn = $_GET['manganh'];
$sqltk = "SELECT Manganh, Tennganh, hoc_ky.Mahk, hoc_ky.Tenhk From nganh_hoc, hoc_ky WHERE nganh_hoc.Mahk = hoc_ky.Mahk and Manganh='$mn'";
$data = mysqli_query($con, $sqltk);


if (isset($_POST['btnSave'])) {
    $tn = $_POST['txtTennganh'];
    $hk = $_POST['txtHk'];
    $sqlup = "UPDATE nganh_hoc SET Tennganh ='$tn', Mahk='$hk' WHERE Manganh='$mn'";
    $kq = mysqli_query($con, $sqlup);
    if ($kq)
        echo "<script>alert('Update ngành học thành công')</script>";
    else
        echo "<script>alert('Update ngành học thất bại')</script>";
}

if (isset($_POST['btnBack'])) {
    header("location: ListNganh.php");
    exit;
}
mysqli_close($con);
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
                <th colspan="2">CẬP NHẬT NGÀNH HỌC</th>
            </tr>
            <?php
            if (isset($data)) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
                    <tr>
                        <td>Mã ngành học</td>
                        <td>
                            <input type="text" name="txtManganh" value="<?php echo $row['Manganh'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên ngành</td>
                        <td>
                            <input type="text" name="txtTennganh" value="<?php echo $row['Tennganh'] ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Học kỳ</td>
                        <td>
                            <input type="text" name="txtHk" value="<?php echo $row['Tenhk'] ?>" disabled>
                        </td>
                    </tr>

            <?php
                }
            }
            ?>

            <tr align="center">
                <td colspan="2">
                    <input type="submit" name="btnSave" value="SAVE">
                    <input type="submit" name="btnBack" value="BACK">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>