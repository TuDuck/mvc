<?php
$connect = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi ket noi');

$sql = "SELECT Mamh, Tenmh, hoc_ky.Tenhk, nganh_hoc.Tennganh, Sotinchi FROM mon_hoc_phi, nganh_hoc, hoc_ky WHERE mon_hoc_phi.Mahk = hoc_ky.Mahk and mon_hoc_phi.Manganh = nganh_hoc.Manganh";
$data = mysqli_query($connect, $sql);

if (isset($_POST['btnTimkiem'])) {
    $Mamon = $_POST['txtTimmamon'];
    $Tenmon = $_POST['txtTimtenmon'];

    $sqlTim = "SELECT Mamh, Tenmh, nganh_hoc.Tennganh, hoc_ky.Tenhk, Sotinchi FROM mon_hoc_phi, nganh_hoc, hoc_ky WHERE mon_hoc_phi.Mahk = hoc_ky.Mahk and hoc_ky.Mahk = nganh_hoc.Mahk and Mamh like '%$Mamon%' and Tenmh like '%$Tenmon%'";
    $data = mysqli_query($connect, $sqlTim);
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>THÔNG TIN MÔN HỌC</h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                            <th>Học kỳ</th>
                            <th>Ngành</th>
                            <th>Số tín chỉ</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data) && $data != null) {
                            $i = 1;
                            while ($rows = mysqli_fetch_array($data)) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $rows['Mamh'] ?></td>
                                    <td><?php echo $rows['Tenmh'] ?></td>
                                    <td><?php echo $rows['Tenhk'] ?></td>
                                    <td><?php echo $rows['Tennganh'] ?></td>
                                    <td><?php echo $rows['Sotinchi'] ?></td>
                                    <td width="200px">
                                        <a href="./Suamon.php?mamon=<?php echo $rows['Mamh'] ?>"><img style="width: 35px;" src="../image/changee.avif"></a>
                                        <a href="./Xoamon.php?mamon=<?php echo $rows['Mamh'] ?>" onclick="return checkDelete()"><img style="width: 35px;" src="../image/deletee.jpg"></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <form method="post" action="">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>THÔNG TIN TÌM KIẾM MÔN HỌC</h4>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td colspan="2" align="center">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Mã môn học
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimmamon">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tên môn
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimtenmon">
                            </td>
                        </tr>

                        <tr>
                            <td align="center" colspan="2">
                                <button class="btn btn-primary" type="submit" name="btnTimkiem">Tìm kiếm</button>
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                    <br>
    </form>
    </div>
    </div>
    </div>
    </div>

    <script>
        function checkDelete() {
            return confirm("XÁC NHẬN XÓA?");
        }
    </script>
</body>

</html>