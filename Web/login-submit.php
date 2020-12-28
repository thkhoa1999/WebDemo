<?php

session_start();
require_once('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from user where username='$username' and password='$password'";
$r = mysqli_query($conn, $query);
if(mysqli_num_rows($r) != 0) {
    $row = mysqli_fetch_array($r);
    $_SESSION['login'] = true;
    $_SESSION['login-id'] = $row['id'];
    $_SESSION['login-name'] = $row['fullname'];
    header('location: index.php');
} else {
    $_SESSION['login-message'] = 'Bạn đã nhập sai tên đăng nhập!';
    header('location: login.php');
}


