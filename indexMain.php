<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
        }

        ul{
            list-style: none;
            background: #22438C;
        }
        ul>li{
            display: inline-block;
            position: relative;
        }
        ul>li>a{
            display: block;
            padding: 20px 25px;
            color: #FFF;
            text-decoration: none;
            text-align: center;
            font-size: 20px;
        }
        ul li ul.dropdown li{
            display: block;
        }
        ul li ul.dropdown {
            width: 100%;
            background: #22438C;
            position: absolute;
            z-index: 999;
            display: none;
        }
        ul li a:hover {
            background: #112C66;
        }
        ul li:hover ul.dropdown {
            display: block;
        }
    </style>
</head>
<body>
    <ul>
        <li><a>HOME</a></li>
        <li>
            <a href="#">MÔN HỌC</a>
            <ul class="dropdown">
                <li><a href="http://localhost:3000/Mon/ListSj.php">LIST</a></li>
                <li><a href="#">INSERT</a></li>
            </ul>
        </li>   
        <li>
            <a href="#">NGÀNH HỌC</a>
            <ul class="dropdown">
                <li><a href="http://localhost:3000/Nganh/ListNganh.php">LIST</a></li>
                <li><a href="#">INSERT</a></li>
            </ul>
        </li>   <li>
            <a href="#">HỌC KỲ</a>
            <ul class="dropdown">
                <li><a href="#">LIST</a></li>
                <li><a href="#">INSERT</a></li>
            </ul>
        </li>   <li>
            <a href="#">ĐƠN GIÁ</a>
            <ul class="dropdown">
                <li><a href="#">LIST</a></li>
                <li><a href="#">INSERT</a></li>
            </ul>
        </li>   
    </ul>
</body>
</html>