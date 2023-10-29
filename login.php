<?php
session_start();
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kết nối với database
    $conn = mysqli_connect("localhost", "root", "", "websitebanhang");
    if (!$conn) {
        die("Không thể kết nối với database");
    }

    // Truy vấn database để lấy thông tin người dùng
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra xem người dùng có tồn tại không
    if (mysqli_num_rows($result) == 0) {
        mysqli_close($conn);
        echo "<script>alert('Tên đăng nhập không tồn tại')</script>";
        return;
    }

    // Lấy mật khẩu đã lưu trong database
    $row = mysqli_fetch_assoc($result);
    $password_hash = $row['password'];

    // So sánh mật khẩu nhập vào với mật khẩu đã lưu
    if ($password === $password_hash) {
        // Đăng nhập thành công
        mysqli_close($conn);
        $_SESSION['username'] = $username;
        header('location: http://localhost/PHP/home.php');
    } else {
        // Đăng nhập thất bại
        mysqli_close($conn);
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
