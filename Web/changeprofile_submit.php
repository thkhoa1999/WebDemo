<?php
    require_once('connect.php');
?>
<?php
    session_start();
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    
    $sql = "update user set fullname='$fullname', email='$email', password='$password' WHERE id='$id' ";
    mysqli_query($conn, $sql);
    $_SESSION['login-name'] = $fullname;
    header('location: profile.php');
?>