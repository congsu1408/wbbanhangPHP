<?php
session_start();
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['username'] = $username;
        header('location: http://localhost/PHP/home.php');
    } else {
//        echo "Sai tên đăng nhập hoặc mật khẩu";
        echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
<form action="login.php" method="post">
    <input type="text" name="username" placeholder="Tên người dùng">
    <input type="password" name="password" placeholder="Mật khẩu">
    <input type="submit" value="Đăng nhập" name="dangnhap">
</form>


</body>
</html>
