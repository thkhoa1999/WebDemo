<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/css/style.css">
    <style>
        a {
            text-decoration: none;
        }
        .nav {
            padding: 10px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            display: flex;
            align-items: center;
        }
        .brand-logo {
            width: 60px;
            height: 60px;
            border-radius: 999px;
            overflow: hidden;
            background-color: gray;
            text-align: center;
        }
        .brand-logo img {
            height: 100%;
        }
        .brand-name {
            margin-left: 10px;
            color: white;
        }
        .menu {
            list-style: none;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 0;
        }
        .menu a{
            display: block;
            padding: 10px 20px;
            color: white;
            font-size: 20px;
            text-transform: uppercase;
        }
        .menu a:hover {
            color: dodgerblue;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="nav">
            <div class="brand">
            <?php
            require_once('config.php');
            if($_SESSION['login']) {
                echo "<div class='brand-logo'>";
                echo "<img src='includes/images/avatar/".$_SESSION['login-id'].".png' alt=''>";
                echo "</div>";
                echo "<div class='brand-name'>".$_SESSION['login-name']."</div>";
            } else {
                echo "<div class='brand-logo'>";
                echo "<img src='includes/images/avatar/guess.png' alt=''>";
                echo "</div>";
                echo "<div class='brand-name'>Public</div>";
            }
            ?>
            </div>
            <ul class="menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="exercise.php">Bài tập</a></li>
                <li><a href="profile.php">Thông tin</a></li>
                <li><a href="changeprofile.php"> Đổi thông tin</a></li>
                <li><a href="viewuser.php">Danh sách</a></li>
                <li><a href="login.php">Đăng nhập</a></li>  
                <li><a href="logout.php">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="content">
