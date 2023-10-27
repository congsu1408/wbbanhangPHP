<?php
$obj = new order();
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "websitebanhang");
// Phân tách URL thành các thành phần
$url_components = explode('/', $_SERVER['REQUEST_URI']);

// Lấy giá trị IP
$maHD = $url_components[4];

// Sử dụng giá trị của trường `ma_loaisp` để truy vấn cơ sở dữ liệu và lấy thông tin chi tiết của sản phẩm
$sql = "SELECT * FROM order_status WHERE maHD = '$maHD'";
$result = mysqli_query($conn, $sql);
$value = mysqli_fetch_assoc($result);

// in ra màn hình giá trị của biến $product
//var_dump($product);

// Hiển thị thông tin chi tiết của sản phẩm trên trang web
//echo "<h2>{$product['tensp']}</h2>";
//echo "<img src='public/images/{$product['hinhanh']}' width='200' alt='{$product['tensp']}'>";
//echo  "<p>Số Lượng: {$product['soluong']}</p>";
//echo "<p>Giá Khuyến Mãi: {$product['dongia']}</p>";

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa đơn hàng</title>
    <link rel="stylesheet" href="../../public/CSS/edit_order.css">
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="ma_hd" value="<?php echo $value['maHD'] ?>">
    <h1>Sửa đơn hàng</h1>
        <table border="1">
            <tr>
                <td>Tên khách hàng</td>
                <td><input type="text" name="tenkh" value="<?php echo $value['tenkh'] ?>"></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="text" name="dienthoai" value="<?php echo $value['dienthoai'] ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $value['email'] ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ liên hệ</td>
                <td><input type="text" name="diachi_lienhe" value="<?php echo $value['diachi_lienhe'] ?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ giao hàng</td>
                <td><input type="text" name="diachi_giaohang" value="<?php echo $value['diachi_giaohang'] ?>"></td>
            </tr>
            <tr>
                <td>Tổng tiền</td>
                <td><input type="text" name="tongtien" value="<?php echo $value['tongtien'] ?>"></td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <select name="trangthai" id="">
                        <option value="Đang giao" <?php if ($value['trangthai'] == 0) echo "selected" ?>>Đang giao</option>
                        <option value="Đã giao" <?php if ($value['trangthai'] == 1) echo "selected" ?>>Đã giao</option>
                        <option value="Đã hủy" <?php if ($value['trangthai'] == 2) echo "selected" ?>>Đã hủy</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Sửa" name="btnsave"></td>
            </tr>
        </table>
</form>
</body>
</html>
<?php
// Lấy giá trị của các trường trong biểu mẫu HTML
$tenkh = isset($_POST['tenkh']) ? $_POST['tenkh'] : "";
$dienthoai = isset($_POST['dienthoai']) ? $_POST['dienthoai'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$diachi_lienhe = isset($_POST['diachi_lienhe']) ? $_POST['diachi_lienhe'] : "";
$diachi_giaohang = isset($_POST['diachi_giaohang']) ? $_POST['diachi_giaohang'] : "";
$tongtien = isset($_POST['tongtien']) ? $_POST['tongtien'] : "";
$trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : "";

if (isset($_POST['btnsave'])) {
    // Gọi hàm `editOrderStatus()` để cập nhật dữ liệu của đơn hàng
    $obj->editOrder($maHD, $tenkh, $dienthoai, $email, $diachi_lienhe, $diachi_giaohang, $tongtien, $trangthai);

    // Chuyển hướng người dùng đến trang danh sách đơn hàng
//    header("Location: http://localhost/PHP/order/showOrderStatus/");
}
?>
