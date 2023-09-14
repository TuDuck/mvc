<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public//Css/about.css">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="par-title">
    <div class="con-title">
        <img height="200" width="200" src="../../MVC/public/img/logo-utt-border.png" alt="anh truong cngtvt">
    </div>
    <div class="con-title">
        <h1>
            học phí
        </h1>
    </div>
    </div>
   
    <div class="par-menu">
       <!-- hiện trang chủ hoặc trang mặc định với mọi trang khác -->
        <table class="table-bordered tb-menu"  border="1">
            <tr>
                <td><a href="">trang chu</a></td>
                <td><a href="">dang xuat</a></td>
                <td><a href="">hoi dap</a></td>
            </tr>
        </table>
    </div>
    <div class="par-content">
        <div class="left-content">
            <table class="table-bordered tb-but" border="1">
                <tr>
                    <td><button>1</button></td>
                </tr>
                <tr>
                    <td><button>2</button></td>
                </tr>
                <tr>
                    <td><button>3</button></td>
                </tr>
                <tr>
                    <td><button>4</button></td>
                </tr>
            </table>
        </div>
        <div class="right-content">
            <?php include_once'./Pages/home.php' ?>
        </div>
    </div>

   
</body>
</html>
