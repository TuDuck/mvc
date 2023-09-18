<?php
$con = mysqli_connect('localhost', 'root', '', 'btl')
    or die('loi let noi roi huhu');

if (isset($_POST['btnInsert'])) {
    $mm = $_POST['txtMh'];
    $nameS = $_POST['tenmh'];
    $stc = $_POST['sotinchi'];
    $gia = $_POST['txtgia'];
    $ID = $_POST['txtId'];
    $checkgia = is_numeric($gia);

    //trung ma
    if ($ID == '') {
        echo '<script>alert("NOT id FILL!!")</script>';
    } else if ($gia == '') {
        echo '<script>alert("NOT cost FILL!!")</script>';
    } elseif ($checkgia == false) {
        echo '<script>alert("FORMAT NUMBER ERROR!!!")</script>';
    } else {
        $slqtrungma = "SELECT * FROM don_gia WHERE Mamh = '$mm'";
        $dataa = mysqli_query($con, $slqtrungma);
        if (mysqli_num_rows($dataa) > 0) {
            echo "<script>alert('TRÙNG MÃ RỒI!!!')</script>";
        } else {
            $sql = "INSERT INTO don_gia VALUES('$ID','$mm','$nameS','$stc', '$gia')";
            $kq = mysqli_query($con, $sql);
            if ($kq)
                echo "<script>alert('Thêm đơn giá thành công')</script>";
            else
                echo "<script>alert('Thêm đơn giá thất bại')</script>";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="ajaxGia.js" type="text/javascript"></script>
    <style>
        .submit {
            width: 20%;
            height: 5%;
            border: 1px;
            border-radius: 05px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }
    </style>
</head>

<body>

    <form method="post" action="">
        <div class="container">
            <h2>THÊM ĐƠN GIÁ MÔN HỌC</h2>

            <Select name="mamh" onchange="">
                <option>--Chọn môn học--</option>
                <?php
                $sqlHk = mysqli_query($con, "SELECT * FROM mon_hoc_phi");
                if (isset($sqlHk) && $sqlHk != null) {
                    while ($row = mysqli_fetch_array($sqlHk)) {
                ?>
                        <option value="<?php echo $row['Mamh'] ?>"><?php echo $row['Tenmh'] ?></option>
                <?php
                    }
                }
                ?>
            </Select>
            <input type="submit" name="search" class="submit" value="SELECT DATA">

            <div class="page-header">
            </div>
            <table class="table table-striped hidden" id="recordListing">
                <thead>
                    <tr>
                        <th>Mã môn học</th>
                        <th>Tên môn học</th>
                        <th>Số tín chỉ</th>
                        <th>ID</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_POST['search'])) {
                        $id = $_POST['mamh'];
                        $sqlMh = "SELECT *FROM mon_hoc_phi where Mamh = '$id'";
                        $data = mysqli_query($con, $sqlMh);
                        while ($rows = mysqli_fetch_array($data)) {
                    ?>
                            <form action="" method="POST">
                                <tr>
                                    <td>
                                        <input type="text" name="txtMh" value="<?php echo $rows['Mamh'] ?>" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="tenmh" value="<?php echo $rows['Tenmh'] ?>" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="sotinchi" value="<?php echo $rows['Sotinchi'] ?>" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="txtId" value="">
                                    </td>
                                    <td>
                                        <input type="text" name="txtgia" value="">
                                    </td>

                                </tr>
                                <tr>
                                    <input type="submit" name="btnInsert" class="submit" value="INSERT">
                                </tr>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

    </form>

</body>

</html>