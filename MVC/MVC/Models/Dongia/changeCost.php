<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');
$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT *FROM don_gia WHERE ID = '$id'");

if (isset($_POST['btnSAVE'])) {
    $cost = $_POST['txtDongia'];

    $sqlUP = "UPDATE don_gia SET Dongia = '$cost' WHERE ID = '$id'";
    $kq = mysqli_query($con, $sqlUP);
    if ($kq)
        echo "<script>alert('Update đơn giá thành công')</script>";
    else
        echo "<script>alert('Update đơn giá thất bại')</script>";
}


if (isset($_POST['btnBack'])) {
    header("location: indexCost.php");
    exit;
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
            <?php
            if (isset($sql) && $sql != null) {
                while ($rows = mysqli_fetch_array($sql)) {
            ?>
                    <tr>
                        <td>ID</td>
                        <td>
                            <input type="text" name="txtID" value="<?php echo $rows['ID'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Mã môn học</td>
                        <td>
                            <input type="text" name="txtMamon" value="<?php echo $rows['Mamh'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên môn học</td>
                        <td>
                            <input type="text" name="txtTenmon" value="<?php echo $rows['Tenmh'] ?>" disabled>
                        </td>
                    </tr>

                    <tr>
                        <td>Số tín chỉ</td>
                        <td>
                            <input type="text" name="txtSotinchi" value="<?php echo $rows['Sotinchi'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td>
                            <input type="text" name="txtDongia" value="<?php echo $rows['Dongia'] ?>">

                        </td>
                    </tr>

            <?php
                }
            }
            ?>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" name="btnSAVE" value="SAVE">
                    <input type="submit" name="btnBack" value="BACK">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>