<?php
$connect = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi ket noi');

$sql = "SELECT Manganh, Tennganh, hoc_ky.Tenhk  FROM nganh_hoc, hoc_ky WHERE nganh_hoc.Mahk = hoc_ky.Mahk";
$data = mysqli_query($connect, $sql);

if (isset($_POST['btnTimkiem'])) {
    $Manganh = $_POST['txtTimmanganh'];
    $Tennganh = $_POST['txtTimtennganh'];
    $tenhk = $_POST['txtTenhk'];
    $sqlTim = "SELECT Manganh, Tennganh, hoc_ky.Tenhk FROM nganh_hoc, hoc_ky WHERE nganh_hoc.Mahk = hoc_ky.Mahk, Manganh like '%$Manganh%' and Tennganh like '%$Tennganh%' and hoc_ky.Tenhk like '%$tenhk%'";
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
    <form method="post">

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>THÔNG TIN NGÀNH HỌC</h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Mã ngành</th>
                            <th>Tên ngành</th>
                            <th>Học kỳ</th>
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
                                    <td><?php echo $rows['Manganh'] ?></td>
                                    <td><?php echo $rows['Tennganh'] ?></td>
                                    <td><?php echo $rows['Tenhk'] ?></td>
                                    <td width="200px" align="center">
                                        <a href="./Suanganh.php?manganh=<?php echo $rows['Manganh'] ?>"><img style="width: 35px;" src="../../public/img/changee.avif"></a>
                                        <a href="./Xoanganh.php?manganh=<?php echo $rows['Manganh'] ?>" onclick="return checkDelete()"><img style="width: 35px;" src="../../public/img/deletee.jpg"></a>
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
                    <h4>THÔNG TIN TÌM KIẾM NGÀNH HỌC</h4>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td colspan="2" align="center">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Mã ngành
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimmanganh">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tên Ngành
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTimtennganh">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Học kỳ
                            </td>
                            <td>
                                <input class="form-control" type="text" name="txtTenhk">
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
    </form>

    <script>
        function checkDelete() {
            return confirm("XÁC NHẬN XÓA?");
        }
    </script>
</body>

</html>