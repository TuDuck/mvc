<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');

$mhk = $_GET['mahk'];
$sqltk = "SELECT *FROM hoc_ky WHERE Mahk='$mhk'";
$data = mysqli_query($con, $sqltk);


if (isset($_POST['btnSave'])) {
    $thk = $_POST['txtTenhk'];

    $sqlup = "UPDATE hoc_ky SET Tenhk ='$thk' WHERE Mahk='$mhk'";
    $kq = mysqli_query($con, $sqlup);
    if ($kq)
        echo "<script>alert('Update học kỳ thành công')</script>";
    else
        echo "<script>alert('Update học kỳ thất bại')</script>";
}

if (isset($_POST['btnBack'])) {
    header("location: ListHK.php");
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
                <th colspan="2">CẬP NHẬT HỌC KỲ</th>
            </tr>
            <?php
            if (isset($data)) {
                while ($row = mysqli_fetch_array($data)) {
            ?>
                    <tr>
                        <td>Mã học kỳ</td>
                        <td>
                            <input type="text" name="txtMahk" value="<?php echo $row['Mahk'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên học kỳ</td>
                        <td>
                            <input type="text" name="txtTenhk" value="<?php echo $row['Tenhk'] ?>">
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