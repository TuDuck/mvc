<?php
$connect = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi ket noi');

$sql = "SELECT * FROM hoc_ky";
$data = mysqli_query($connect, $sql);

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
                <h2>THÔNG TIN HỌC KỲ</h2>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Mã học kỳ</th>
                            <th>Tên học kỳ</th>
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
                                    <td><?php echo $rows['Mahk'] ?></td>
                                    <td><?php echo $rows['Tenhk'] ?></td>
                                    <td width="200px" align="center">
                                        <a href="./SuaHK.php?mahk=<?php echo $rows['Mahk'] ?>"><img style="width: 35px;" src="../image/changee.avif"></a>
                                        <a href="./XoaHK.php?mahk=<?php echo $rows['Mahk'] ?>"><img style="width: 35px;" src="../image/deletee.jpg"></a>
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

</body>

</html>