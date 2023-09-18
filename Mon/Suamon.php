<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');
$mm = $_GET['mamon'];

$sql = mysqli_query($con, "SELECT Mamh, Tenmh, hoc_ky.Tenhk, nganh_hoc.Tennganh, Sotinchi
    FROM mon_hoc_phi, nganh_hoc, hoc_ky WHERE mon_hoc_phi.Mahk = hoc_ky.Mahk 
                                          and mon_hoc_phi.Manganh = nganh_hoc.Manganh and Mamh = '$mm'");

if (isset($_POST['btnSAVE'])) {
    $nameS = $_POST['txtTenmon'];
    $hk = $_POST['txtHk'];
    $tn = $_POST['txtTennganh'];
    $stc = $_POST['txtStc'];

    if ($tn == '') {
        echo '<script>alert("NGÀNH GÌ ???")</script>';
        echo "<script>window.location.href='./Suamon.php'</script>";
    } else {

        $sqlUP = "UPDATE mon_hoc_phi SET Tenmh = '$nameS', Mahk = '$hk', Manganh = '$tn', Sotinchi = '$stc' WHERE Mamh = '$mm'";
        $kq = mysqli_query($con, $sqlUP);
        if ($kq)
            echo "<script>alert('Thêm môn học thành công')</script>";
        else
            echo "<script>alert('Thêm môn học thất bại')</script>";
    }
}

if (isset($_POST['btnBack'])) {
    header("location: ListSj.php");
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
                        <td>Mã môn học</td>
                        <td>
                            <input type="text" name="txtMamon" value="<?php echo $rows['Mamh'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên môn học</td>
                        <td>
                            <input type="text" name="txtTenmon" value="<?php echo $rows['Tenmh'] ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Học kỳ</td>
                        <td>
                            <Select class="hk" name="txtHk" id="select  ">
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
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Số tín chỉ</td>
                        <td>
                            <input type="text" name="txtStc" value="<?php echo $rows['Sotinchi'] ?>">
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